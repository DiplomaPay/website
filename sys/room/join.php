<?php
include"../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$room_code = $json->room_code;
$token = $json->token;

checkToken($conexao,$token);

$room_code = mysqli_real_escape_string($conexao, $room_code);

if(!$room_code){
    $obj = array("status" => $__STATUS__, "response" => false, "message" => "Informe o código da sala");
    endCode($obj);
}

$queryRoom = mysqli_query($conexao, "select * from room where room_code='$room_code'");

if(mysqli_num_rows($queryRoom) < 1){
    $obj = array("status" => $__STATUS__, "response" => false, "message" => "Sala não encontrada");
    endCode($obj);
}

$checkUser = mysqli_query($conexao, "select * from users where authToken='$token'") or endCodeError();

$__ID__ = mysqli_fetch_assoc($checkUser)["id"];

$queryRoomUser = mysqli_query($conexao, "select * from join_room where room_code='$room_code' and iduser='$__ID__'");

if(mysqli_num_rows($queryRoomUser) > 0){
    $obj = array("status" => $__STATUS__, "response" => false, "message" => "Você já está nessa sala");
    endCode($obj);
}



mysqli_query($conexao, "insert into join_room (iduser, room_code) values ('$__ID__', '$room_code')");

$obj = array("status" => $__STATUS__, "response" => true, "message" => "Entrou na sala com sucesso!");
endCode($obj);

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array("status" => $__STATUS__, "response" => false, "message" => "Failed to connect the server, try again."));
    exit;
}


