<?php
include"../../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$code = scapeString($__CONEXAO__, $json->code);
$code = encrypt($code);
$write = encrypt("pending");

$query = mysqli_query($__CONEXAO__, "select bankid from paymentOrders where orderCode='$code' and status='$write'") or die("erro 1");

if(mysqli_num_rows($query) < 1){
    endCode("Pagamento não encontrado.", false);
}

$pay_id = mysqli_fetch_assoc($query)['bankid'];
$pay_id = decrypt($pay_id);

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
    $status = encrypt($status);
    mysqli_query($__CONEXAO__, "update orders set status='1' where code='$code'");
    mysqli_query($__CONEXAO__, "update paymentOrders set status='$status' where orderCode='$code'");
    
    endCode("Aprovado!", "aprovado");
}

endCode("$status", false);