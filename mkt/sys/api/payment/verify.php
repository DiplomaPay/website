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
    $query = mysqli_query($__CONEXAO__, "select products from orders where code='$code'");
    $prod = mysqli_fetch_assoc($query)['products'];
    $prod = json_decode(decrypt($prod));
    foreach($prod as $item){
        $iditem = $item->id;
        $qtitem = $item->quant;
        
        $query2 = mysqli_query($__CONEXAO__, "select quant from products where id='$iditem'");
        $qtitematual = mysqli_fetch_assoc($query2)['quant'];
        $qtitematual = decrypt($qtitematual);
        if($qtitematual - $qtitem < 0){
            $status = encrypt("declined");
            mysqli_query($__CONEXAO__, "update paymentOrders set status='$status' where orderCode='$code'");
            mysqli_query($__CONEXAO__, "update orders set status='2' where code='$code'"); //cancelado
            endCode('Desculpe pelo erro, já retornaremos seu dinheiro.', false);
        }
    }

    foreach($prod as $item){
        $iditem = $item->id;
        $qtitem = $item->quant;
        
        $query2 = mysqli_query($__CONEXAO__, "select quant from products where id='$iditem'");
        $qtitematual = mysqli_fetch_assoc($query2)['quant'];
        $qtitematual = decrypt($qtitematual);
        $val = $qtitematual - $qtitem;
        $val = setNum($val);
        mysqli_query($__CONEXAO__, "update products set quant='$val' where id='$iditem'");
    }

    mysqli_query($__CONEXAO__, "update orders set status='1' where code='$code'");
    mysqli_query($__CONEXAO__, "update paymentOrders set status='$status' where orderCode='$code'");
    $status = decrypt($status);
    
    // reembolso caso tenha acabado o estoque e retirar do estoque
}

endCode("$status", false);