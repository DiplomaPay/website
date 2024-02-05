<?php
include"../conexao.php";
include"../auth.php";

justLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$pay_id = $_GET["id"];

$queryPayment = mysqli_query($conexao, "select * from payment_pix where pay_id='$pay_id' and iduser='$__ID__'")or endCodeError();

if(mysqli_num_rows($queryPayment) < 1){
    $obj = array("status" => $__STATUS__, "response" => false, "message" => "Id incorreto");
    endCode($obj);
}

$d = mysqli_fetch_assoc($queryPayment);

$statusPayment = $d['status'];
$ammountPayment = $d['ammount'];


if($statusPayment != "approved"){
    $obj = array("status" => $__STATUS__, "response" => false, "message" => "Não elegivel para reembolso");
    endCode($obj);
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.mercadopago.com/v1/payments/$pay_id/refunds",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    "Authorization: $__AUTH__",
    "Public-Key: $__KEY__",
    'Content-Type: application/json'
  ),
  CURLOPT_POSTFIELDS => json_encode(array(
    'amount' => floatval($ammountPayment)
  ))
));

$response = curl_exec($curl);
$res = json_decode($response);
curl_close($curl);

$id = $res->id;
$status = $res->status;

if($status == "approved"){
    $query = mysqli_query($conexao, "update payment_pix set status='refund', refundid='$id'");

    $to = $__EMAIL__;
    $subject = "Pagamento reembolsado - $id";

    $message = "
    <html>
        <head>
            <title>Pagamento reembolsado - $id</title>
            <style>
                body { font-family: Arial, sans-serif; }
            </style>
        </head>
        <body>
            <div style='background-color:#269C72; color:white; text-align:center; padding: 5px; border-radius: 5px'>
                <h2 style='color:white;'>DiplomaPay</h2>
            </div>
            <div style='text-align:center; padding: 5px'>
                <h3 style='color:black;'>Pagamento reembolsado - $id</h3>
                <h1 style='color:black;'>R$$ammountPayment</h1>
                <h4 style='color:black;'>Seu pagamento foi reembolsado!</h4>
                <p style='color:black; font-size: 12px'>Todos os direitos reservados - DiplomaPay 2024</p>
            </div>
        </body>
    </html>
    ";

    $sendEmail = mail($to, $subject, $message, implode("\r\n", $__HEADERS__));

    $obj = array("status" => $__STATUS__, "response" => true, "message" => "Reembolsado com sucesso");
    endCode($res);
}

$obj = array("status" => $__STATUS__, "response" => true, "message" => "Não aprovado");
endCode($res);



function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array("status" => $__STATUS__, "response" => false, "message" => "Failed to connect the server, try again."));
    exit;
}

