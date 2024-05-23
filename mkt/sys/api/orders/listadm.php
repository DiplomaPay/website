<?php
include"../../conexao.php";

// justLog($__EMAIL__, $__TYPE__, 2);

$getAllActiveOrders = mysqli_query($__CONEXAO__, "select * from orders where status>'1'");

$arrayProducts = array();

while($data = mysqli_fetch_array($getAllActiveOrders)){
    $id         = $data["id"];
    $code       = $data["code"];
    $products   = $data["products"];

    $items = array(
        "id"        =>$id, 
        "code"      =>decrypt($code),
        "products"  =>decrypt($products), 
    );

    array_push($arrayProducts, $items);
}

endCode($arrayProducts, true);