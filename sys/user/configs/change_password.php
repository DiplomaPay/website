<?php
include"../../conexao.php";
header('Content-Type: application/json; charset=utf-8');


$request = file_get_contents('php://input');
$json = json_decode($request);

$mail = $json->mail;
$code = $json->code;
$password = $json->password;
$new_password = $json->new_password;

$mail = str_replace(" ", "", $mail);
$code = str_replace(" ", "", $code);


$mail = mysqli_real_escape_string($conexao, $mail);
$code = mysqli_real_escape_string($conexao, $code);
$password = mysqli_real_escape_string($conexao, $password);
$new_password = mysqli_real_escape_string($conexao, $new_password);

if(!$mail and !$code or $code and !$mail){
    $obj = array(status => $__STATUS__, response => false, message => "Insira os dados corretamente.");
    endCode($obj);
}

if($mail and !$code){
    $queryEmail = mysqli_query($conexao, "select * from users where email='$mail'") or endCodeError();

    if(mysqli_num_rows($queryEmail) > 0){
        sendMail($conexao, $mail, $__HEADERS__);
        $obj = array(status => $__STATUS__, response => true, message => "Código de recuperação enviado.");
        endCode($obj);
    };

    $obj = array(status => $__STATUS__, response => false, message => "Email não encontrado.");
    endCode($obj);
}

if($mail and $code and !$password and !$new_password){
    $queryCode = mysqli_query($conexao, "select * from users where email='$mail' and set_code='$code'") or endCodeError();

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

$queryLast = mysqli_query($conexao, "select * from users where email='$mail' and set_code='$code'") or endCodeError();

if(mysqli_num_rows($queryLast) > 0){
    $queryFinal = mysqli_query($conexao, "update users set password='$password', set_code='' where email='$mail' and set_code='$code'") or endCodeError();

    if($queryFinal){
        $obj = array(status => $__STATUS__, response => true, message => "Senha alterada com sucesso.");

        $to = $mail;
        $subject = "Sua senha foi alterada";
        $message = "
        <html>
            <head>
                <title>Sua senha foi alterada</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                </style>
            </head>
            <body>
                <div style='background-color:#269C72; color:white; text-align:center; padding: 5px; border-radius: 5px'>
                    <h2 style='color:white;'>DiplomaPay</h2>
                </div>
                <div style='text-align:center; padding: 5px'>
                    <h1 style='color:black;'>Sua senha foi alterada com sucesso!</h1>
                    <p style='color:black; font-size: 12px'>$password</p>
                    <p style='color:black; font-size: 12px'>Todos os direitos reservados - DiplomaPay 2024</p>
                </div>
            </body>
        </html>
        ";

        $sendEmail = mail($to, $subject, $message, implode("\r\n", $__HEADERS__));

        endCode($obj);  
    }

    $obj = array(status => $__STATUS__, response => false, message => "Erro ao alterar a senha.");
    endCode($obj);
}

$obj = array(status => $__STATUS__, response => false, message => "Verifique os dados e tente novamente.");
endCode($obj);

function sendMail($conexao, $mail, $__HEADERS__){
    function generateCode(){
        global $conexao;
        do {
            $code = bin2hex(random_bytes(3));
            $queryRoom = mysqli_query($conexao, "select * from users where set_code='$code'");
        } while(mysqli_num_rows($queryRoom) > 0);
    
        return $code;
    }
    
    $randomCode = generateCode();
    mysqli_query($conexao, "update users set set_code='$randomCode' where email='$mail'") or endCodeError();

    $to = $mail;
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
