<?php
include"../conexao.php";

justLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$queryRooms = mysqli_query($conexao, "select * from join_room where iduser='$__ID__'") or die("erro");


echo json_encode();
