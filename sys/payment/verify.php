<?php
include"../conexao.php";

justLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$pay_id = $_GET["id"];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.mercadopago.com/v1/payments/$pay_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => 'GET',
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

$status = $res->status;
$pay_id = $res->id;






if($status_res){
  $q = mysqli_query($conexao, "update payment_pix set status='$status' where pay_id='$pay_id'") or die("");

  $to = $__EMAIL__;
  $subject = "Pagamento confirmado - #$pay_id";

  $message = "
  <html>
      <head>
          <title>Pagamento confirmado - #$pay_id</title>
          <style>
              body { font-family: Arial, sans-serif; }
          </style>
      </head>
      <body>
          <div style='background-color:#269C72; color:white; text-align:center; padding: 5px; border-radius: 5px'>
              <h2 style='color:white;'>DiplomaPay</h2>
          </div>
          <div style='text-align:center; padding: 5px'>
              <h1 style='color:black;'>Pagamento confirmado - #$pay_id</h1>
              <h4 style='color:black;'>Seu pagamento foi confirmado!</h4>
              <p style='color:black; font-size: 12px'>Todos os direitos reservados - DiplomaPay 2024</p>
          </div>
      </body>
  </html>
  ";

  $sendEmail = mail($to, $subject, $message, implode("\r\n", $__HEADERS__));
}

$status_res = $status == "approved" ? true : false;

$obj = array(response => $status_res, message => "Pagamento atualizado.", status_pix => "$status", id_pix => $pay_id);

echo json_encode($obj);
