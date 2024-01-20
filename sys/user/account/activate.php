<?php
include"../../conexao.php";

cantLog($__EMAIL__);

header('Content-Type: application/json; charset=utf-8');

$request = file_get_contents('php://input');
$json = json_decode($request);

// Recived data 
$code = $json->code;

$code = str_replace(" ", "", $code);

// Processed data
$code = mysqli_real_escape_string($conexao, $code);

//STEP 1 -> Check code
$queryCode = mysqli_query($conexao, "select * from users where active='false' and set_code='$code'") or endCodeError();

if(mysqli_num_rows($queryCode) < 1){
    $obj = array(status => $__STATUS__, response => false, message => "Code not found.");
    endCode($obj);
}

$email = mysqli_fetch_assoc($queryCode)['email'];

//STEP 2 -> Activate accound
mysqli_query($conexao, "update users set active='true', set_code='' where set_code='$code'") or endCodeError();
$obj = array(status => $__STATUS__, response => true, message => "Account activated.");

$to = $email;
$subject = "Conta ativada com sucesso";
$message = "
<html>
    <head>
        <title>Conta ativada com sucesso!</title>
        <style>
            body { font-family: Arial, sans-serif; }
        </style>
    </head>
    <body>
        <div style='background-color:#269C72; color:white; text-align:center; padding: 5px; border-radius: 5px'>
            <h2 style='color:white;'>DiplomaPay</h2>
        </div>
        <div style='text-align:center; padding: 5px'>
            <h1 style='color:black;'>Conta ativada com sucesso!</h1>
            <p style='color:black; font-size: 12px'>Obrigado por escolher a DP!</p>
            <p style='color:black; font-size: 12px'>Todos os direitos reservados - DiplomaPay 2024</p>
        </div>
    </body>
</html>
";


$sendEmail = mail($to, $subject, $message, implode("\r\n", $__HEADERS__));

endCode($obj);

// FUNCTION 
function endCode($obj){
    echo json_encode($obj);
    exit;
}

function endCodeError(){
    echo json_encode(array(status => $__STATUS__, response => false, message => "Failed to connect the server, try again."));
    exit;
}

