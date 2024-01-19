<?php
include"./conexao.php";

$t = time();

mysqli_query($conexao, "insert into cron_job (time) values ('$t')");