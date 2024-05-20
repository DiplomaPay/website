<?php
include"../../conexao.php";

// justLog($__EMAIL__, $__TYPE__, 1);

$request = file_get_contents('php://input');
$json = json_decode($request);

$id     = scapeString($__CONEXAO__, $json->id);
$id     = decrypt(setNum($id));

$query      = mysqli_query($__CONEXAO__, "select orderCode from paymentOrders where id='$id'");
$orderCode  = mysqli_fetch_assoc($query)['orderCode'];
$query      = mysqli_query($__CONEXAO__, "select products from orders where code='$orderCode'");



mysqli_query($__CONEXAO__, "update orders set status='$status' where id='$id'");

endCode("Pedido realizado, aguardando pagamento!", true);
