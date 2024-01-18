<?php
include"../../conexao.php";

cantLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

// Recived data 
$email = $json->email;
$password = $json->password;

$email = str_replace(" ", "", $email);

// Processed data
$email = mysqli_real_escape_string($conexao, $email);
$password = mysqli_real_escape_string($conexao, $password);

// STEP 1 -> Verify data
if(!$email or !$password){
    $obj = array(status => $__STATUS__, response => false, message => "Something is missing!");
    endCode($obj);
}

// STEP 2 -> Check database
$queryUserByEmail = mysqli_query($conexao, "select * from users where email='$email'") or endCodeError();;

if(mysqli_num_rows($queryUserByEmail) < 1){
    $obj = array(status => $__STATUS__, response => false, message => "User not found.");
    endCode($obj);
}

// STEP 3 -> Get user data
$userFullData = mysqli_fetch_assoc($queryUserByEmail);

$userEmail = $userFullData['email'];
$userName = $userFullData['full_name'];
$userPasswordHash = $userFullData['password'];
$userActive = $userFullData['active'];

// STEP 4 -> Check Active
if($userActive == "false"){
    $obj = array(status => $__STATUS__, response => false, message => "Activate your account.");
    endCode($obj);
}


// STEP 5 -> Check password
if(!password_verify($password, $userPasswordHash)){
    $obj = array(status => $__STATUS__, response => false, message => "Wrong password.");
    endCode($obj);
}

// STEP 6 -> Update last login
$time = time();
mysqli_query($conexao, "update users set last_login='$time' where email='$userEmail'") or endCodeError();;

// STEP 7 -> Sucess auth
$obj = array(status => $__STATUS__, response => true, message => "Success.");

$_SESSION["__EMAIL__"] = $userEmail;
$_SESSION["__USER__"] = $userName;

endCode($obj);


// FUNCTIONS 

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array(status => $__STATUS__, response => false, message => "Failed to connect the server, try again."));
    exit;
}