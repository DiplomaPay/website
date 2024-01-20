<?php
include"../conexao.php";

justLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$queryRooms = mysqli_query($conexao, "select * from join_room where iduser='$__ID__'") or die("erro");

$rooms = array();

while($dados = mysqli_fetch_array($queryRooms)){

    $room_code = $dados['room_code'];

    $queryUniqueRoom = mysqli_query($conexao, "select * from room where room_code='$room_code'");

    $room_name = mysqli_fetch_assoc($queryUniqueRoom)['room_name'];
    $room_id = mysqli_fetch_assoc($queryUniqueRoom)['id'];

    $data = array(id=>$room_id, room_name=>$room_name);

    array_push($rooms, $data);
}

echo json_encode($rooms);
