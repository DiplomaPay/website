<?php
include"../conexao.php";
include"../auth.php";

justLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$pay_id = $_GET["id"];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.mercadopago.com/v1/payments/$pay_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    "Authorization: $__AUTH__",
    "Public-Key: $__KEY__",
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$res = json_decode($response);
curl_close($curl);

$status = $res->status;
$pay_id = $res->id;
$pay_ammount = $res->transaction_amount;

$status_res = $status == "approved" ? true : false;

if($status_res){
  $q = mysqli_query($conexao, "update payment_pix set status='$status' where pay_id='$pay_id'") or die("");

  $to = $__EMAIL__;
  $subject = "Pagamento confirmado - $pay_id";

  $message = "
  <html>
      <head>
          <title>Pagamento confirmado - $pay_id</title>
          <style>
              body { font-family: Arial, sans-serif; }
          </style>
      </head>
      <body>
          <div style='background-color:#269C72; color:white; text-align:center; padding: 5px; border-radius: 5px'>
              <h2 style='color:white;'>DiplomaPay</h2>
          </div>
          <div style='text-align:center; padding: 5px'>
              <h3 style='color:black;'>Pagamento confirmado - $pay_id</h3>
              <h1 style='color:black;'>R$$pay_ammount</h1>
              <h4 style='color:black;'>Seu pagamento foi confirmado!</h4>
              <p style='color:black; font-size: 12px'>Todos os direitos reservados - DiplomaPay 2024</p>
          </div>
      </body>
  </html>
  ";

  $sendEmail = mail($to, $subject, $message, implode("\r\n", $__HEADERS__));
}

$obj = array("response" => $status_res, "message" => "Pagamento atualizado.", "status_pix" => "$status", "id_pix" => $pay_id);
endCode($obj);

function endCode($obj){
  echo json_encode($obj);
  exit;
}

function endCodeError(){
  echo json_encode(array("status" => $__STATUS__, "response" => false, "message" => "Failed to connect the server, try again."));
  exit;
}

