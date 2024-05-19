<?php
include"../../conexao.php";

justLog($__EMAIL__, $__TYPE__, 1);

$getAllActiveOrders = mysqli_query($__CONEXAO__, "select * from orders where user='$__ID__'");

$arrayProducts = array();

while($data = mysqli_fetch_array($getAllActiveOrders)){
    $id         = $data["id"];
    $code       = $data["code"];
    $total      = $data["total"];
    $status     = $data["status"];
    $products   = $data["products"];

    $items = array(
        "id"        =>$id, 
        "code"      =>decrypt($code),
        "total"     =>decrypt($total),
        "status"    =>decrypt($status),
        "products"  =>decrypt($products), 
    )

    array_push($arrayProducts, $items);
}

endCode($arrayProducts, true);