<?php
include"../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$room_code = $json->room_code;

$room_code = mysqli_real_escape_string($conexao, $room_code);

 