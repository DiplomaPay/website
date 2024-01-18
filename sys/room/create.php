<?php
include"../conexao.php";

cantLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$room_name = $json->room_name;
$assinatura = $json->assinatura;

$room_name = mysqli_real_escape_string($conexao, $room_name);
$assinatura = mysqli_real_escape_string($conexao, $assinatura);


if(!$room_name or $room_name == ""){
    $obj = array(status => $__STATUS__, response => false, message => "Digite um nome para a sala");
    endCode($obj);
}

//STEP 5 -> Generate activation code
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$charactersLength = strlen($characters);
$randomCode = '';

for ($i = 0; $i < 5; $i++) {
    $randomCode .= $characters[rand(0, $charactersLength - 1)];
}

mysqli_query($conexao, "insert into room (creatorid, room_name, room_code) values ('$__ID__', '$room_name', '$randomCode')");

$obj = array(status => $__STATUS__, response => true, message => "Sala criada com sucesso!");
endCode($obj);

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array(status => $__STATUS__, response => false, message => "Failed to connect the server, try again."));
    exit;
}



