<?php
session_start();

include"checkmobile.php";
include"functions.php";
include"checkflood.php";
include"auth.php";

date_default_timezone_set('America/Sao_Paulo');
header('Content-Type: text/html; charset=utf-8');

// SERVER
$__METHOD__ = $_SERVER["REQUEST_METHOD"];
$__STATUS__ = $_SERVER["REDIRECT_STATUS"];
$__URL__ = $_SERVER["HTTP_HOST"];

$__HOST__ = $_SERVER['HTTP_HOST'];
$__WEB__ = $_SERVER['REQUEST_SCHEME'] . "://" . $__HOST__;

$__CONEXAO__ = mysqli_connect(
    "localhost",
    "u752370168_dpaymkt",
    "Easycodex123#$#$",
    "u752370168_dpaymkt"
) or die ("Atualize a página e tente novamente!");

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

// USER 

$__EMAIL__ = $_SESSION["email"];
$__PASSWORD__ = $_SESSION["password"];

$_query_ = mysqli_query($__CONEXAO__, "select * from users where email='$__EMAIL__' and senha='$__PASSWORD__'");

if(mysqli_num_rows($_query_) < 1){
    session_destroy();
    session_start();

    $__EMAIL__ = $_SESSION["email"];
    $__PASSWORD__ = $_SESSION["password"];
} else {
    $__ASSOC__  = mysqli_fetch_assoc($_query_);
    $__ID__     = $__ASSOC__['id'];
    $__TYPE__   = $__ASSOC__['typeC'];
    $__EMAIL__  = $__ASSOC__['email'];
    $__ACTIVE__ = $__ASSOC__['active'];

    if($__ACTIVE__ == "0"){
        endCode("Sua conta está inativa, peça para um administrador reativar", false);
    };
}

// DATA 

$__TIME__ = time();

$__YEAR__ = date("Y");

$__CODE__ = generateCode();

function generateCode(){
    return bin2hex(random_bytes(3));
}

// EMAIL 

$__HEADERS__[] = 'MIME-Version: 1.0';
$__HEADERS__[] = 'Content-type: text/html; charset=iso-8859-1';
$__HEADERS__[] = "From: Voleibol <noreply@$__URL__>";
$__HEADERS__[] = "Reply-to: no-reply";
$__HEADERS__[] = 'X-Mailer: PHP/' . phpversion();

