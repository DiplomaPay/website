<?php
include"../../conexao.php";

justLog($__EMAIL__, $__TYPE__, 2);

$request = file_get_contents('php://input');
$json = json_decode($request);

$name   = scapeString($__CONEXAO__, $json->name);
$desc   = scapeString($__CONEXAO__, $json->desc);
$price  = scapeString($__CONEXAO__, $json->price);
$image  = scapeString($__CONEXAO__, $json->image);
$quant  = scapeString($__CONEXAO__, $json->quant);

$name   = setName($name);
$desc   = setNoXss($desc);
$price  = encrypt(floatval($price));
$quant  = setNum($quant);

// nome temporario pra image 
$image = $__CODE__;

checkMissing(
    array(
        $name,
        $desc,
        $price,
        $quant
    )
)

$checkExist = mysqli_query($__CONEXAO__, "select id from products where name='$name'");

if(mysqli_num_rows($checkExist) > 0){
    endCode("Produto já cadastrado.", false);
}

mysqli_query($__CONEXAO__, "insert into products (name, description, price, image, quant) values ('$name','$desc','$price','$image', '$quant')");

endCode("Cadastrado com sucesso!", true);
