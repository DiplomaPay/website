<?php
$status = intval($_GET["status"]);

$valid_status = array(400,401,403,404,503);

http_response_code(400);

if(!$status or !in_array($status, $valid_status)){
    $status = "Invalid status: #43";
} else {
    http_response_code($status);
}

echo "
    <h1>$status</h1>
    <a href='./'>Voltar</a>
";
?>