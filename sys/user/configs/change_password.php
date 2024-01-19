<?php
include"../../conexao.php";
header('Content-Type: application/json; charset=utf-8');

ini_set('display_errors','On');
    error_reporting(E_ALL);

$request = file_get_contents('php://input');
$json = json_decode($request);

$email = $json->email;
$code = $json->code;
$password = $json->password;
$new_password = $json->new_password;

$email = str_replace(" ", "", $email);
$code = str_replace(" ", "", $code);


$email = mysqli_real_escape_string($conexao, $email);
$code = mysqli_real_escape_string($conexao, $code);
$password = mysqli_real_escape_string($conexao, $password);
$new_password = mysqli_real_escape_string($conexao, $new_password);

if(!$email and !$code or $code and !$email){
    $obj = array(status => $__STATUS__, response => false, message => "Insira os dados corretamente.");
    endCode($obj);
}

if($email and !$code){
    $queryEmail = mysqli_query($conexao, "select * from users where email='$email'") or endCodeError();

    if(mysqli_num_rows($queryEmail) > 0){
        sendMail($conexao, $email);
        $obj = array(status => $__STATUS__, response => true, message => "Código de recuperação enviado.");
        endCode($obj);
    };

    $obj = array(status => $__STATUS__, response => false, message => "Email não encontrado.");
    endCode($obj);
}

if($email and $code and !$password and !$new_password){
    $queryCode = mysqli_query($conexao, "select * from users where email='$email' and set_code='$code'") or endCodeError();

    if(mysqli_num_rows($queryCode) > 0){
        $obj = array(status => $__STATUS__, response => true, message => "Código válido.");
        endCode($obj);
    }

    $obj = array(status => $__STATUS__, response => false, message => "Código inválido.");
    endCode($obj);
}

if(!$password or !$new_password or $password != $new_password){
    $obj = array(status => $__STATUS__, response => false, message => "Verifique as senhas.");
    endCode($obj);
}

$password = password_hash($new_password, PASSWORD_DEFAULT);

$queryLast = mysqli_query($conexao, "select * from users where email='$email' and set_code='$code'") or endCodeError();

if(mysqli_num_rows($queryLast) > 0){
    $queryFinal = mysqli_query($conexao, "update users set password='$password', set_code='' where email='$email' and set_code='$code'") or endCodeError();

    if($queryFinal){
        $obj = array(status => $__STATUS__, response => true, message => "Senha alterada com sucesso.");
        endCode($obj);  
    }

    $obj = array(status => $__STATUS__, response => false, message => "Erro ao alterar a senha.");
    endCode($obj);
}

$obj = array(status => $__STATUS__, response => false, message => "Verifique os dados e tente novamente.");
endCode($obj);

function sendMail($conexao, $email){
    function generateCode(){
        global $conexao;
        do {
            $code = bin2hex(random_bytes(3));
            $queryRoom = mysqli_query($conexao, "select * from users where set_code='$code'");
        } while(mysqli_num_rows($queryRoom) > 0);
    
        return $code;
    }
    
    $randomCode = generateCode();
    mysqli_query($conexao, "update users set set_code='$randomCode' where email='$email'") or endCodeError();

    $to = $email;
    $subject = "Seu código de recuperação é $randomCode";
    $message = "
    <html>
        <head>
            <title>Seu código de recuperação é $randomCode</title>
            <style>
                body { font-family: Arial, sans-serif; }
            </style>
        </head>
        <body>
            <div style='background-color:#269C72; color:white; text-align:center; padding: 5px; border-radius: 5px'>
                <h2 style='color:white;'>DiplomaPay</h2>
            </div>
            <div style='text-align:center; padding: 5px'>
                <p style='color:black;'>Seu código de recuperação é</p>
                <h1 style='color:black;'>$randomCode</h1>
                <p style='color:black; font-size: 12px'>Todos os direitos reservados - DiplomaPay 2024</p>
            </div>
        </body>
    </html>
    ";

    $sendEmail = mail($to, $subject, $message, implode("\r\n", $__HEADERS__));

    if(!$sendEmail) {
        $obj = array(status => $__STATUS__, response => false, message => "Falha ao enviar email, tente novamente.");
        endCode($obj);
    }
}

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array(status => $__STATUS__, response => false, message => "Failed to connect the server, try again."));
    exit;
}
