<?php
include"../../conexao.php";

// justLog($__EMAIL__, $__TYPE__, 1);

$request = file_get_contents('php://input');
$json = json_decode($request);

$total = 0;

$products = $json->items;

var_dump($products);

foreach($products as &$item){
    endCode($item, false);
    $item = setArray($item, 'setNum');
    $item = setArray($item, 'decrypt');

    $id = $item->id;
    $qt = $item->quant;

    checkMissing(array(
        $id,
        $qt
    ));

    $query  = mysqli_query($__CONEXAO__, "select price, quant from products where id='$id'");
    $data   = mysqli_fetch_assoc($data);
    $quant  = $data['quant'];
    $price  = $data['price'];
    $price  = decrypt($price);

    if($qt > $quant){
        endCode('Quantidade de itens selecionada superior a presente no estoque. Item: ' . $id, false);
    }
    
    $total += $price * $qt;
}
$total = setNoXss(($total));

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

do{
    $code = encrypt($__CODE__);
} while(mysqli_num_rows(mysqli_query($__CONEXAO__, "select id from orders where code='$code'")) > 0);

// passar primeiro o banco, se der erro n mostra pro usuario
mysqli_query($__CONEXAO__, "insert into paymentOrders (orderCode, status, bankcode, bankid, paymentType) values ('$code','$status','$bankcode','$bankid','$paytype')") or endCode("Erro ao salvar pagamento");

// passar apos salvar banco, mostrar pro usuario somente se o anterior der certo 
mysqli_query($__CONEXAO__, "insert into orders (user, products, total, code, status) values ('$__ID__', '$products', '$total', '$code', '0')") or endCode('Erro ao gerar pedido');

endCode("Pedido realizado, aguardando pagamento!", true);
