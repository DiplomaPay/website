<?php
include"../../conexao.php";

$getAllProducts = mysqli_query($__CONEXAO__, "select * from products");

$arrayProducts = array();

while($data = mysqli_fetch_array($getAllProducts)){
    $id     = $data["id"];
    $name   = $data["name"];
    $image  = $data["image"];
    $quant  = $data["quant"];
    $price  = $data["price"];
    $description = $data["description"];

    $items = array(
        "id"            =>$id, 
        "name"          =>decrypt($name), 
        "image"         =>decrypt($image),
        "quant"         =>decrypt($quant),
        "price"         =>decrypt($price),
        "description"   =>decrypt($description)
    );

    array_push($arrayProducts, $items);
}

endCode($arrayProducts, true);