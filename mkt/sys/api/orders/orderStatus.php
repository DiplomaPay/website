<?php
include"../../conexao.php";

// justLog($__EMAIL__, $__TYPE__, 2);

$request = file_get_contents('php://input');
$json = json_decode($request);

$id     = scapeString($__CONEXAO__, $json->id);
$status = scapeString($__CONEXAO__, $json->status);

$id     = decrypt(setNum($id));
$status = decrypt(setNum($status));


mysqli_query($__CONEXAO__, "update orders set status='$status' where id='$id'");

endCode("Pedido realizado, aguardando pagamento!", true);
