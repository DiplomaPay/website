<?php
include"../../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$curl = curl_init();

$ammount = 1.00;

$data = array(
    'transaction_amount' => $ammount,
    'description' => "Teste produto",
    'payment_method_id' => "credit_card", // Alterado de "pix" para "credit_card"
    'payer' => [
      'email' => "fulano@gmail.com",
      'first_name' => "Fulano",
      'last_name' => "Ciclano",
      'identification' => [ // Adicionado para pagamento com cartão
        'type' => 'CPF',
        'number' => '12345678909'
      ]
    ],
    'payment_method' => [ // Movido para fora do objeto "payer"
        'card_number' => '4235647728025682',
        'card_expiration_month' => '11',
        'card_expiration_year' => '2025',
        'security_code' => '123'
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

mysqli_query($conexao, "insert into payment_card (status, pay_id, ammount) values ('$status','$pay_id','$ammount')");

// $obj = array(response => true, message => "Pagamento pendente.", status_card => "$status", id_card => $pay_id, ammount_card => $ammount);

echo $response;
?>
