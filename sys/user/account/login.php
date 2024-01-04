<?php
include"../../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

// Recived data 
$email = $json->email;
$password = $json->password;

// Processed data
$email = mysqli_real_escape_string($conexao, $email);
$password = mysqli_real_escape_string($conexao, $email);

// STEP 1 -> Verify data
if(!$email or $password){
    $obj = array(status => $__STATUS__, response => false, message => "Something is missing!");
    endCode();
}

// STEP 2 -> Check database
$queryUserByEmail = mysqli_query($conexao, "select * from users where email='$email'");

if(mysqli_num_rows($queryUserByEmail) < 1){
    $obj = array(status => $__STATUS__, response => false, message => "User not found.");
    endCode();
}

// STEP 3 -> Check password
$userFullData = mysqli_fetch_assoc($queryUserByEmail);

$userPasswordHash = $userFullData['password'];

if(!password_verify($password, $userPasswordHash)){
    $obj = array(status => $__STATUS__, response => false, message => "Wrong password.");
    endCode();
}

// STEP 3 -> Sucess auth
$obj = array(status => $__STATUS__, response => true, message => "Success.");
endCode();


// FUNCTIONS 

function endCode(){
    echo json_encode($obj);
    exit;
}
