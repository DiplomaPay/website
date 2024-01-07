<?php
$status = intval($_GET["status"]);

$valid_status = array(400,401,403,404,503);

http_response_code(400);

if(!$status or !in_array($status, $valid_status)){
    $status = "Invalid status: #43";
} else {
    http_response_code($status);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro <?php echo $status; ?></title>
    <style>
        *{
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            color: white;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 20px;
            background: black;
            height: 100svh;
        }
        h1{
            font-size: 60px;
        }
    </style>
</head>
<body>
    <h1><?php echo $status ?></h1>
    <a href="./">Página inicial</a>
</body>
</html>