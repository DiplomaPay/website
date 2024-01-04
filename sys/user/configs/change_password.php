<?php
include"../conexao.php";
header('Content-Type: application/json');

$request = file_get_contents('php://input');
$json = json_decode($request);

