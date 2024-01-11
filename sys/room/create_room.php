<?php
include"../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$room_name = $json->room_name;
$assinatura = $json->assinatura;

$room_name = mysqli_real_escape_string($conexao, $room_name);
$assinatura = mysqli_real_escape_string($conexao, $assinatura);

