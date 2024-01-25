<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
$conexao = mysqli_connect('localhost','u752370168_dpay','Easycodex123','u752370168_dpay') or die ("Atualize a página e tente novamente!");


header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: *');

header('Access-Control-Allow-Headers: *');

// USER ACCOUNT
$__USER__ = $_SESSION["__USER__"];
$__CPF__ = $_SESSION["__CPF__"];
$__EMAIL__ = $_SESSION["__EMAIL__"];
$__PASSWORD__ = $_SESSION["__PASSWORD__"];

$_query_ = mysqli_query($conexao, "select * from users where email='$__EMAIL__' and password='$__PASSWORD__'");

if(mysqli_num_rows($_query_) < 1){
    session_destroy();
    session_start();

    $__USER__ = $_SESSION["__USER__"];
    $__CPF__ = $_SESSION["__CPF__"];
    $__EMAIL__ = $_SESSION["__EMAIL__"];
    $__PASSWORD__ = $_SESSION["__PASSWORD__"];
} else {
    $__ID__ = mysqli_fetch_assoc($_query_)['id'];
}

// SERVER
$__METHOD__ = $_SERVER["REQUEST_METHOD"];
$__STATUS__ = $_SERVER["REDIRECT_STATUS"];
$__URL__ = $_SERVER["HTTP_HOST"];    

// EMAIL SERVICE

$__CODE__ = bin2hex(random_bytes(3)).bin2hex(random_bytes(3));


$__HEADERS__[] = 'MIME-Version: 1.0';
$__HEADERS__[] = 'Content-type: text/html; charset=iso-8859-1';
$__HEADERS__[] = "From: DiplomaPay <contato_$__CODE__@dpay.trive.fun>";
$__HEADERS__[] = "Reply-To: noreply_$__CODE__@dpay.trive.fun";
$__HEADERS__[] = 'X-Mailer: PHP/' . phpversion();

// FUNCTIONS 

function cantLog($__EMAIL__){
    if($__EMAIL__){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array(status => 401, response => false, message => "You're logged"));
        exit;
    }
}

function justLog($__EMAIL__){
    if(!$__EMAIL__){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array(status => 401, response => false, message => "You're not logged in."));
        exit;
    }
}
?>
