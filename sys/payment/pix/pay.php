<?php
include"../../conexao.php";
include"../../auth.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$token = $json->token;

checkToken($conexao,$token);

$checkUser = mysqli_query($conexao, "select * from users where authToken='$token'") or endCodeError();

$__ID__ = mysqli_fetch_assoc($checkUser)["id"];
$__EMAIL__ = mysqli_fetch_assoc($checkUser)["email"];
$__USER__ = mysqli_fetch_assoc($checkUser)["full_name"];

header('Content-Type: application/json; charset=utf-8');

$curl = curl_init();

$request = file_get_contents('php://input');
$json = json_decode($request);

$ammount = $json->value;
$room_code = $json->room_code;

$queryRoom = mysqli_query($conexao, "select * from join_room where iduser='$__ID__' and room_code='$room_code'");

if(mysqli_num_rows($queryRoom) < 1){
  $obj = array("response" => false, "message" => "Não autorizado. $__ID__ $idroom");
  endCode($obj);
}

$data = array(
    'transaction_amount' => $ammount,
    'description' => "[R:0][U:$__ID__] - Produto pix",
    'payment_method_id' => "pix",
    'payer' => [
      'email' => "e-$__EMAIL__",
      'first_name' => "$__USER__",
    ]
);

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mercadopago.com/v1/payments',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => array(
    "Authorization: $__AUTH__",
    "Public-Key: $__KEY__",
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$res = json_decode($response);
curl_close($curl);

$pay_id = $res->id;
$status = $res->status;
$pay_code = $res->point_of_interaction->transaction_data->qr_code;
$pay_code_img = $res->point_of_interaction->transaction_data->qr_code_base64;
$pay_ammount = $res->transaction_amount;

if($pay_code){
  mysqli_query($conexao, "insert into payment_pix (status, iduser, room_code, pay_id, pay_code, ammount) values ('$status', '$__ID__','$room_code','$pay_id','$pay_code','$ammount')");

  $obj = array("response" => true, "message" => "Pagamento pendente.", "status_pix" => "$status", "id_pix" => $pay_id, "code_pix" => "$pay_code", "ammount_pix" => $ammount, "pay_code_img" => "$pay_code_img");
  endCode($obj);
}

$obj = array("response" => false, "message" => "Erro ao gerar pix.");
endCode($obj);


function endCode($obj){
  echo json_encode($obj);
  exit;
}

function endCodeError(){
  echo json_encode(array("status" => $__STATUS__, "response" => false, "message" => "Failed to connect the server, try again."));
  exit;
}


