<?php
include"../../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$email = $json->email;
$password = $json->password;
$confirm_password = $json->confirm_password;

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$email_verify = filter_var($email, FILTER_VALIDATE_EMAIL);

if($email and $password == $confirm_password){
    
}

$obj = array(status => $__STATUS__, log_status => false, message => "Failed to login", email => $email_verify, password => $password_hash);

echo json_encode($obj);

