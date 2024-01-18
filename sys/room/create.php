<?php
include"../conexao.php";

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

function generateCode(){
    global $conexao;
    do {
        $code = bin2hex(random_bytes(3));
        $queryRoom = mysqli_query($conexao, "select * from room where room_code='$code'");
    } while(mysqli_num_rows($queryRoom) > 0);

    return $code;
}

$randomCode = generateCode();

$checkUser = mysqli_query($conexao, "select * from users where email='$__EMAIL__' and password='$__PASSWORD__'") or endCodeError();

if(mysqli_num_rows($checkUser) < 1){
    $obj = array(status => $__STATUS__, response => false, message => "Erro de usuário");
    endCode($obj);
};

$__ID__ = mysqli_fetch_assoc($checkUser)["id"];

mysqli_query($conexao, "insert into room (creatorid, room_name, room_code) values ('$__ID__', '$room_name', '$randomCode')") or endCodeError();
mysqli_query($conexao, "insert into join_room (iduser, room_code, typeuser) values ('$__ID__', '$randomCode', 'owner')") or endCodeError();

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



