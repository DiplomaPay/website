<?php
include"../conexao.php";

justLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$curl = curl_init();

$request = file_get_contents('php://input');
$json = json_decode($request);

$room_code = $json->room_code;

$queryRooms = mysqli_query($conexao, "select * from payment_pix where room_code='$room_code'") or die("erro");

$payments = array();

while($dados = mysqli_fetch_array($queryRooms)){
    
}

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array("status" => $__STATUS__, "response" => false, "message" => "Failed to connect the server, try again."));
    exit;
}


