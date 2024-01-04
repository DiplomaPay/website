<?php
include"../../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$email = $json->email;
$password = $json->password;


$obj = array(status => $__STATUS__, response => false, message => "Failed to login", time=>time());

echo json_encode($obj);

