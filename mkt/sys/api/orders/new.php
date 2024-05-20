<?php
include"../../conexao.php";

// justLog($__EMAIL__, $__TYPE__, 1);

$request = file_get_contents('php://input');
$json = json_decode($request);


$items   = scapeString($__CONEXAO__, $json->items); // array de objetos
// separar array acima, fazer loop e verificar item por item, checkmissing dentro
// do loop e encrypt tambem (sets)

$products = array(); // repassar itens aqui dentro apos verificação

// colocar valor total dos itens somados (somar do loop) 
$total = 0;

// n tem set ainda pra float, so pra num int 
$total = encrypt(floatval($total));

// n da para passar somente code, ele muda, deixei dinamico 
$code = $__CODE__;

// gerar pagamento api mercado pago aq e passar os dados 
// bankid -> id pagamneto mercado pago 

// AQ É ficticio por enquanto

$bankcode   = encrypt("asdbhj234.gov.bb.pix.ficticio.189256328578758345.id.pix");
$bankid     = encrypt(1751264738);
$paytype    = encrypt("pix");
$status     = encrypt("pending");

$products = encrypt(json_encode($products));
$code = encrypt($code);

// passar primeiro o banco, se der erro n mostra pro usuario
mysqli_query($__CONEXAO__, "insert into paymentOrders (orderCode, status, bankcode, bankid, paymentType) values ('$code','$status','$bankcode','$bankid','$paytype')") or endCode("Erro ao salvar pagamento");

// passar apos salvar banco, mostrar pro usuario somente se o anterior der certo 
mysqli_query($__CONEXAO__, "insert into orders (user, products, total, code, status) values ('$__ID__', '$products', '$total', '$code', '0')") or endCode('Erro ao gerar pedido');

endCode("Pedido realizado, aguardando pagamento!", true);
