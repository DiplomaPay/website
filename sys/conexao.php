<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
$conexao = mysqli_connect('localhost','u752370168_dpay','Easycodex123','u752370168_dpay') or die ("Atualize a página e tente novamente!");

// USER ACCOUNT
$__USER__ = $_SESSION["__USER__"];
$__EMAIL__ = $_SESSION["__EMAIL__"];
$__PASSWORD__ = $_SESSION["__PASSWORD__"];

$_query_ = mysqli_query($conexao, "select * from users where email='$__EMAIL__' and password='$__PASSWORD__'");

if(mysqli_num_rows($_query_) < 1){
    session_destroy();
    session_start();

    $__USER__ = $_SESSION["__USER__"];
    $__EMAIL__ = $_SESSION["__EMAIL__"];
    $__PASSWORD__ = $_SESSION["__PASSWORD__"];
}

// SERVER
$__METHOD__ = $_SERVER["REQUEST_METHOD"];
$__STATUS__ = $_SERVER["REDIRECT_STATUS"];
$__URL__ = $_SERVER["HTTP_HOST"];

function cantLog($__EMAIL__){
    if($__EMAIL__){
        echo "boo";
        exit;
    }
}
?>
