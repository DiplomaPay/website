<?php
include"../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$curl = curl_init();

$data = array(
    'transaction_amount' => 100.0,
    'token' => "2323",
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
    'Authorization: Bearer TEST-5056284625992718-010720-0ed75a2e6c7caf2596f0d792490b4134-50812775',
    'Public-Key: TEST-8442b5ef-d877-4ecf-a391-1ca734da9d21',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$res = json_decode($response);
curl_close($curl);

$pay_id = $res->id;
$status = $res->status;
$ammount = $res->transaction_amount;
$pay_code = $res->point_of_interaction->transaction_data->qr_code;

mysqli_query($conexao, "insert into payment_pix (status, pay_id, pay_code, ammount) values ('$status','$pay_id','$pay_code','$ammount')");

// $obj = array(status => $__STATUS__, response => true, message => "Pagamento pendente.", status_pix => $status, id_pix => $pay_id, code_pix => $pay_code, ammount_pix => $ammount);

// echo json_encode($obj)
