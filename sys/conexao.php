<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
$conexao = mysqli_connect('localhost','u752370168_dpay','Easycodex123','u752370168_dpay') or die ("Atualize a página e tente novamente!");

// USER ACCOUNT
$__USER__ = $_SESSION["__USER__"];
$__EMAIL__ = $_SESSION["__EMAIL__"];

// SERVER
$__METHOD__ = $_SERVER["REQUEST_METHOD"];
$__STATUS__ = $_SERVER["REDIRECT_STATUS"];
$__URL__ = $_SERVER["HTTP_HOST"];

//IF LOGGED CANT ACCESS



function cantLog(){
    if($__EMAIL__ && $__EMAIL__ != ""){
        header("Location: ../../");
        exit;
    }
}
echo $__EMAIL__;
?>
