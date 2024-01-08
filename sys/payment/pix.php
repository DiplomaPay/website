<?php

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
  CURLOPT_URL => 'https://api.mercadopago.com/v1/payments/1320525853',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_POSTFIELDS => json_encode($data),
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer TEST-5056284625992718-010720-0ed75a2e6c7caf2596f0d792490b4134-50812775',
    'Public-Key: TEST-8442b5ef-d877-4ecf-a391-1ca734da9d21',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
