<?php
include"../../conexao.php";
header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

$email = $json->email;
$code = $json->code;
$password = $json->password;
$new_password = $json->new_password;

$email = mysqli_real_escape_string($conexao, $email);
$code = mysqli_real_escape_string($conexao, $code);
$password = mysqli_real_escape_string($conexao, $password);
$new_password = mysqli_real_escape_string($conexao, $new_password);

if(!$email and !$code){
    $obj = array(status => $__STATUS__, response => false, message => "$email, $code, $password, $new_password");
    endCode($obj);
}

if($email and !$code){
    $queryEmail = mysqli_query($conexao, "select * from users where email='$email'") or endCodeError();

    if(mysqli_num_rows($queryEmail) > 0){
        sendMail($email);
        $obj = array(status => $__STATUS__, response => true, message => "Código de recuperação enviado.");
        endCode($obj);
    };

    $obj = array(status => $__STATUS__, response => false, message => "Email não encontrado.");
    endCode($obj);
}

if($email and $code and !$password and !$new_password){
    $queryCode = mysqli_query($conexao, "select * from users where email='$email' and code='$code'") or endCodeError();

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

mysqli_query($conexao, "update users set password='$password' where email='$email' and activation_code='$code'") or endCodeError();
$obj = array(status => $__STATUS__, response => true, message => "Senha alterada com sucesso.");
endCode($obj);

function sendMail($email){
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomCode = '';

    for ($i = 0; $i < 5; $i++) {
        $randomCode .= $characters[rand(0, $charactersLength - 1)];
    }

    mysqli_query($conexao, "update users set activation_code='$randomCode' where email='$email'") or endCodeError();

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

    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = 'From: contato@dpay.trive.fun';
    $headers[] = 'Reply-To: contato@dpay.trive.fun';
    $headers[] = 'X-Mailer: PHP/' . phpversion();

    $sendEmail = mail($to, $subject, $message, implode("\r\n", $headers));

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
    echo json_encode(array(status => $__STATUS__, response => false, message => "Failed to connect the server, try again. $email, $code, $password, $new_password"));
    exit;
}
