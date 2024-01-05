<?php
include"../../conexao.php";

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);


// Recived data 
$email = $json->email;
$password = $json->password;
$confirm_password = $json->confirm_password;
$cpf = $json->cpf;
$name = $json->name;

// Processed data
$email = mysqli_real_escape_string($conexao, $email);
$password = mysqli_real_escape_string($conexao, $password);
$confirm_password = mysqli_real_escape_string($conexao, $confirm_password);
$cpf = mysqli_real_escape_string($conexao, $cpf);
$name = mysqli_real_escape_string($conexao, $name);


// STEP 1 -> Verify data
if(!$email or !$password or !$confirm_password or !$cpf or !$name){
    $obj = array(status => $__STATUS__, response => false, message => "Something is missing!");
    endCode($obj);
}


// STEP 2 -> Check password
if($password !== $confirm_password){
    $obj = array(status => $__STATUS__, response => false, message => "Check password and try again.");
    endCode($obj);
}

// hash password 
$password = password_hash($password, PASSWORD_DEFAULT);

//STEP 3 -> Check user email database
$queryCheckUserEmail = mysqli_query($conexao, "select * from users where email='$email'") or endCodeError();

if(mysqli_num_rows($queryCheckUserEmail) > 0){
    $obj = array(status => $__STATUS__, response => false, message => "Email already in use.");
    endCode($obj);
}

//STEP 4 -> Check user CPF database
$queryCheckUserEmail = mysqli_query($conexao, "select * from users where cpf='$cpf'") or endCodeError();

if(mysqli_num_rows($queryCheckUserEmail) > 0){
    $obj = array(status => $__STATUS__, response => false, message => "CPF already in use.");
    endCode($obj);
}

//STEP 5 -> Generate activation code
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$charactersLength = strlen($characters);
$randomCode = '';

for ($i = 0; $i < 5; $i++) {
    $randomCode .= $characters[rand(0, $charactersLength - 1)];
}

//STEP 6 -> Register user
$time = time();

mysqli_query($conexao, "insert into users (email, password, cpf, full_name, created, activation_code) values ('$email', '$password', '$cpf', '$name', '$time', '$randomCode')") or endCodeError();

//STEP 7 -> SEND EMAIL
$to = 'brunoricardowotzke@gmail.com';
$subject = "Seu código de ativação é $randomCode";
$message = "
<html>
    <head>
        <title>Seu código de ativação é $randomCode</title>
        <style>
            body { font-family: Arial, sans-serif; }
        </style>
    </head>
    <body>
        <div style='background-color:black; color:white; text-align:center; padding: 5px'>
            <p style='color:white;'>Seu código de verificação é</p>
        <div>
        <div style='text-align:center; padding: 5px'>
            <h1 style='color:black;'>$randomCode</h1>
            <p style='color:black;'>Todos os direitos reservados</p>
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
    echo json_encode(array(status => $__STATUS__, response => false, message => "Falha ao enviar email, clique para reenviar."));
    endCode($obj);
}

$obj = array(status => $__STATUS__, response => false, message => "Sucess.");
endCode($obj);

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array(status => $__STATUS__, response => false, message => "Failed to connect the server, try again."));
    exit;
}
