<?php
include"../conexao.php";

justLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$queryRooms = mysqli_query($conexao, "select * from join_room where iduser='$__ID__'") or die("erro");

$rooms = array();

while($dados = mysqli_fetch_array($queryRooms)){

    $room_code = $dados['room_code'];

    $typeuser = $dados['typeuser'];

    $queryUniqueRoom = mysqli_query($conexao, "select * from room where room_code='$room_code'");

    $queryValueRoom = mysqli_query($conexao, "select sum(ammount) as total_room from payment_pix where room_code='$room_code' and status='approved'");

    $ammount_room = mysqli_fetch_assoc($queryValueRoom)["total_room"];

    if(!$ammount_room){
        $ammount_room = 0;
    }

    $d = mysqli_fetch_assoc($queryUniqueRoom);

    $room_name = $d['room_name'];
    $room_id = $d['id'];

    $data = array(id=>$room_id, room_name=>$room_name, room_code=>$room_code, typeuser=>$typeuser, ammount_room => $ammount_room);

    array_push($rooms, $data);
}

echo json_encode($rooms);
