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

// DADOS DA SALA 

$queryUniqueRoom = mysqli_query($conexao, "select * from room where room_code='$room_code'");

$assoc = mysqli_fetch_assoc($queryUniqueRoom);

$room_name = $d['room_name'];
$room_id = $d['id'];
$user_room = mysqli_num_rows($queryUniqueRoom);

$type_bool = $typeuser == "owner" ? true : false;



// USER 
$queryValueRoomUser = mysqli_query($conexao, "select sum(ammount) as total_room_user from payment_pix where room_code='$room_code' and status='approved' and iduser='$__ID__'");
$total_room_user = mysqli_fetch_assoc($queryValueRoomUser)["total_room_user"];

if(!$total_room_user){
    $total_room_user = 0;
}





// VALOR DA SALA 
$queryValueRoom = mysqli_query($conexao, "select sum(ammount) as total_room from payment_pix where room_code='$room_code' and status='approved'");
$total_room = mysqli_fetch_assoc($queryValueRoom)["total_room"];

if(!$total_room){
    $total_room = 0;
}

$data = array("id"=>$room_id, "room_name"=>$room_name, "room_code"=>$room_code, "typeuser"=>$typeuser, "typeuser_bool"=>$type_bool, "ammount_room" => $total_room, "ammount_room_user" => $total_room_user,'user_room'=>mysqli_num_rows($numUsers));
endCode($data);

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array("status" => $__STATUS__, "response" => false, "message" => "Failed to connect the server, try again."));
    exit;
}


