<?php
include"../conexao.php";

cantLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$room_name = $json->room_name;
$assinatura = $json->assinatura;

$room_name = mysqli_real_escape_string($conexao, $room_name);
$assinatura = mysqli_real_escape_string($conexao, $assinatura);


if(!$room_name or $room_name == ""){
    $obj = array(status => $__STATUS__, response => false, message => "Digite um nome para a sala");
    endCode($obj);
}

if(!$assinatura or $assinatura != "concordo"){
    $obj = array(status => $__STATUS__, response => false, message => "Digite 'concordo' para aceitar");
    endCode($obj);
}

//STEP 5 -> Generate activation code
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$charactersLength = strlen($characters);
$randomCode = '';

for ($i = 0; $i < 5; $i++) {
    $randomCode .= $characters[rand(0, $charactersLength - 1)];
}

$checkUser = mysqli_query($conexao, "select * from users where email='$__EMAIL__' and password='$__PASSWORD__'");

if(mysqli_num_rows($checkUser) < 1){
    $obj = array(status => $__STATUS__, response => false, message => "Erro de usuário");
    endCode($obj);
};

$__ID__ = mysqli_fetch_assoc($checkUser)["id"];

mysqli_query($conexao, "insert into room (creatorid, room_name, room_code) values ('$__ID__', '$room_name', '$randomCode')");

$obj = array(status => $__STATUS__, response => true, message => "Sala criada com sucesso!");
endCode($obj);

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array(status => $__STATUS__, response => false, message => "Failed to connect the server, try again."));
    exit;
}



