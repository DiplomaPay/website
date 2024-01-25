<?php
include"../../conexao.php";

cantLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);


// Recived data 
$email = $json->email;

$query = mysqli_query($conexao, "select * from users where email='$email' and active='false'");

if(mysqli_num_rows($query) < 1){
    $obj = array(status => $__STATUS__, response => false, message => "Email já está ativo.");
    endCode($obj);
}

//STEP 5 -> Generate activation code
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

//STEP 7 -> SEND EMAIL
$to = $email;
$subject = "Seu novo código é $randomCode";
$message = "
<html>
    <head>
        <title>Seu novo código é $randomCode</title>
        <style>
            body { font-family: Arial, sans-serif; }
        </style>
    </head>
    <body>
        <div style='background-color:#269C72; color:white; text-align:center; padding: 5px; border-radius: 5px'>
            <h2 style='color:white;'>DiplomaPay</h2>
        </div>
        <div style='text-align:center; padding: 5px'>
            <p style='color:black;'>Seu novo código é</p>
            <h1 style='color:black;'>$randomCode</h1>
            <p style='color:black; font-size: 13px'>Obrigado por escolher a DP!</p>
            <p style='color:black; font-size: 12px'>Todos os direitos reservados - DiplomaPay 2024</p>
        </div>
    </body>
</html>
";

$sendEmail = mail($to, $subject, $message, implode("\r\n", $__HEADERS__));

if(!$sendEmail) {
    $obj = array(status => $__STATUS__, email=>$sendEmail ,response => false, message => "Falha ao enviar email, clique para reenviar.");
    endCode($obj);
}

$obj = array(status => $__STATUS__, response => true, message => "Sucess.");
endCode($obj);

function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array(status => $__STATUS__, response => false, message => "Failed to connect the server, try again."));
    exit;
}
