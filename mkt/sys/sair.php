<?php
include 'conexao.php';

justLog($__EMAIL__, $__TYPE__, 1);

session_destroy();
echo "Saindo...";
?>
<script>
    localStorage.leave = "true";
</script>
