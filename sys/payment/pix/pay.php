<?php
include"../../conexao.php";

justLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$curl = curl_init();

$request = file_get_contents('php://input');
$json = json_decode($request);

$ammount = $json->value;
// $ammount = floatval($ammount);
// $ammount = number_format($ammount, 2, '.', '');

// $ammount = mysqli_real_escape_string($conexao, $ammount);

$data = array(
    'transaction_amount' => $ammount,
    'description' => "Teste produto",
    'payment_method_id' => "pix",
    'payer' => [
      'email' => "fulano@gmail.com",
      'first_name' => "Fulano",
      'last_name' => "Ciclano",
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
    // TESTES ->
    // 'Authorization: Bearer TEST-5056284625992718-010720-0ed75a2e6c7caf2596f0d792490b4134-50812775',
    // 'Public-Key: TEST-8442b5ef-d877-4ecf-a391-1ca734da9d21',
    // REAL ->
    'Authorization: Bearer APP_USR-5056284625992718-010720-8f3ef5796104ab4ed6dd46bda8cc493c-50812775',
    'Public-Key: APP_USR-7fb9bd3b-0834-4195-8c52-2c22ba74253c',
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

mysqli_query($conexao, "insert into payment_pix (status, pay_id, pay_code, ammount) values ('$status','$pay_id','$pay_code','$ammount')");

$obj = array(response => true, message => "Pagamento pendente.", status_pix => "$status", id_pix => $pay_id, code_pix => "$pay_code", ammount_pix => $ammount, pay_code_img => "$pay_code_img");

echo json_encode($obj);
