<?php
include"../../conexao.php";

// justLog($__EMAIL__, $__TYPE__, 1);

$request = file_get_contents('php://input');
$json = json_decode($request);

$total = 0;

$products = $json->items;

foreach($products as &$item){
    $item = setArray($item, 'setNum');

    $id = $item->id;
    $qt = $item->quant;
    
    checkMissing(array(
        $id,
        $qt
    ));
    
    $item = setArray($item, 'decrypt');

    $id = $item->id;
    $qt = $item->quant;

    $query  = mysqli_query($__CONEXAO__, "select price, quant from products where id='$id'");

    if(mysqli_num_rows($query) < 1){
        endCode("Produto inválido - $id", false);
    }
    
    $data   = mysqli_fetch_assoc($query);
    $quant  = $data['quant'];
    $price  = $data['price'];
    $quant  = decrypt($quant);
    $price  = decrypt($price);

    if($qt > $quant){
        endCode("Quantidade de itens selecionada superior a presente no estoque. Item: $id", false);
    }
    
    $total += $price * $qt;
}


$infosPix = pixPay($total, $__AUTH__, $__KEY__);

$total = setNoXss($total);

$code = encrypt($__CODE__);

$bankcode   = encrypt($infosPix[0]["code_pix"]);
$bankid     = encrypt($infosPix[0]["pix_id"]);
$paytype    = encrypt("pix");
$status     = encrypt($infosPix[0]["status_pix"]);
$products   = encrypt(json_encode($products));

endCode(decrypt($bankid), false);

do{
    $code = encrypt($__CODE__);
} while(mysqli_num_rows(mysqli_query($__CONEXAO__, "select id from orders where code='$code'")) > 0);

mysqli_query($__CONEXAO__, "insert into paymentOrders (orderCode, status, bankcode, bankid, paymentType) values ('$code','$status','$bankcode','$bankid','$paytype')") or endCode("Erro ao salvar pagamento");

mysqli_query($__CONEXAO__, "insert into orders (user, products, total, code, status) values ('$__ID__', '$products', '$total', '$code', '0')") or endCode('Erro ao gerar pedido');

$obj = array("ammount"=> decrypt($total), "base64"=>$infosPix[0]["img64"], "code_pix"=>decrypt($bankcode), "code"=>decrypt($code), "pix_id"=>decrypt($bankid));
endCode($obj, "dontreload");
