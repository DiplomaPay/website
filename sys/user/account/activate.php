<?php
include"../../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

// Recived data 
$code = $json->code;

// Processed data
$code = mysqli_real_escape_string($conexao, $code);

//STEP 1 -> Check code
$queryCode = mysqli_query($conexao, "select * from users where active='false' and set_code='$code'") or endCodeError();

if(mysqli_num_rows($queryCode) < 1){
    $obj = array(status => $__STATUS__, response => false, message => "Code not found.");
    endCode($obj);
}

//STEP 2 -> Activate accound
mysqli_query($conexao, "update users set active='true' where set_code='$code'") or endCodeError();
$obj = array(status => $__STATUS__, response => true, message => "Account activated.");
endCode($obj);

// FUNCTION 
function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array(status => $__STATUS__, response => false, message => "Failed to connect the server, try again."));
    exit;
}

