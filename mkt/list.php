<!-- listar itens (user) -> botao deletar e editar (adm) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
</head>
<body>
    <div id='productsList'>
    </div>

    <script>
        fetch("./sys/api/products/list.php")
        .then(e=>e.json())
        .then(e=>{
            console.log(e);
        })
    </script>
</body>
</html>