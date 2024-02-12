<?php
include"../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$room_code = $json->room_code;
$token = $json->token;

checkToken($token);

$room_code = mysqli_real_escape_string($conexao, $room_code);

if(!$room_code){
    $obj = array("status" => $__STATUS__, "response" => false, "message" => "Informe o código da sala") or endCodeError();
    endCode($obj);
}

$checkUser = mysqli_query($conexao, "select * from users where authToken='$token'") or endCodeError();

$__ID__ = mysqli_fetch_assoc($checkUser)["id"];

$queryUserRoom = mysqli_query($conexao, "select * from join_room where iduser='$__ID__' and room_code='$room_code'") or endCodeError();

if(mysqli_num_rows($queryUserRoom) < 1){
    $obj = array("status" => $__STATUS__, "response" => false, "message" => "Usuário não está nessa sala");
    endCode($obj);
}


$queryRoom = mysqli_query($conexao, "delete from room where room_code='$room_code'") or endCodeError();
$queryRoom = mysqli_query($conexao, "delete from join_room where room_code='$room_code'") or endCodeError();

if(!$queryRoom){
    $obj = array("status" => $__STATUS__, "response" => false, "message" => "Erro ao deletar");
    endCode($obj);
}


$obj = array("status" => $__STATUS__, "response" => true, "message" => "Sala deletada!");
endCode($obj);

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array("status" => $__STATUS__, "response" => false, "message" => "Failed to connect the server, try again."));
    exit;
}


