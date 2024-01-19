<?php
include"../../conexao.php";

$name = $_GET["name"];

mysqli_query($conexao, "truncate $name");

echo json_encode(array(status => $__STATUS__, response => true, message => "Limpo $name."));
exit;