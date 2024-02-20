<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
$conexao = mysqli_connect('localhost','u752370168_dpay','Easycodex123','u752370168_dpay') or die ("Atualize a página e tente novamente!");

$allowed_domains = ['https://vale.anizero.cc', 'http://localhost', 'https://localhost'];

if (in_array($_SERVER['HTTP_ORIGIN'], $allowed_domains)) {
    header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
}

header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Credentials: true');
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
$__HEADERS__[] = "From: DiplomaPay <contato_$__CODE__@diplomapay.com>";
$__HEADERS__[] = "Reply-To: noreply_$__CODE__@diplomapay.com";
$__HEADERS__[] = 'X-Mailer: PHP/' . phpversion();

// FUNCTIONS 


function newToken(){
    $token = hash('sha256', password_hash(microtime(), PASSWORD_DEFAULT));
    return $token;
}

function checkToken($conexao, $token){
    if(!$token){
        echo json_encode(array("status" => $__STATUS__, "response" => false, "message" => "Invalid token"));
        exit;
    }
    
    $queryToken = mysqli_query($conexao, "select * from users where authToken='$token'");

    if(mysqli_num_rows($queryToken) < 1){
        echo json_encode(array("status" => $__STATUS__, "response" => false, "message" => "Invalid token"));
        exit;
    }
}

function cantLog($__EMAIL__){
    if($__EMAIL__){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array("status" => 401, "response" => false, "message" => "You're logged"));
        exit;
    }
}

function justLog($__EMAIL__){
    if(!$__EMAIL__){
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(array("status" => 401, "response" => false, "message" => "You're not logged in."));
        exit;
    }
}
?>
