<?php
include"../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$token = $json->token;

checkToken($conexao,$token);


$checkUser = mysqli_query($conexao, "select * from users where authToken='$token'") or endCodeError();

$__ID__ = mysqli_fetch_assoc($checkUser)["id"];

$queryRooms = mysqli_query($conexao, "select * from join_room where iduser='$__ID__'") or die("erro");

$rooms = array();

while($dados = mysqli_fetch_array($queryRooms)){

    $room_code = $dados['room_code'];

    $typeuser = $dados['typeuser'];

    $numUsers = mysqli_query($conexao, "select * from join_room where room_code='$room_code'");

    $queryUniqueRoom = mysqli_query($conexao, "select * from room where room_code='$room_code'");

    $queryValueRoom = mysqli_query($conexao, "select sum(ammount) as total_room from payment_pix where room_code='$room_code' and status='approved'");

    $ammount_room = mysqli_fetch_assoc($queryValueRoom)["total_room"];

    if(!$ammount_room){
        $ammount_room = 0;
    }

    $d = mysqli_fetch_assoc($queryUniqueRoom);

    $room_name = $d['room_name'];
    $room_id = $d['id'];

    $type_bool = $typeuser == "owner" ? true : false;

    $data = array("id"=>$room_id, "room_name"=>$room_name, "room_code"=>$room_code, "typeuser"=>$typeuser, "typeuser_bool"=>$type_bool, "ammount_room" => $ammount_room, 'user_room'=>mysqli_num_rows($numUsers));

    array_push($rooms, $data);
}

echo json_encode($rooms);
