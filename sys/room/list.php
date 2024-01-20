<?php
include"../conexao.php";

justLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$queryRooms = mysqli_query($conexao, "select * from join_room where iduser='$__ID__'");

$rooms = array();

while($dados = mysqli_fetch_array($queryRooms)){

    $idroom = $dados['idroom'];

    $queryUniqueRoom = mysqli_query($conexao, "select * from room where id='$idroom'");

    $room_name = mysqli_fetch_assoc($queryUniqueRoom)['room_name'];

    $data = array(id=>$idroom, room_name=>$room_name);

    array_push($rooms, $data);
}

echo json_encode($rooms);
