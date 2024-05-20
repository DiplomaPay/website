<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
    <script src="js/cart.js"></script>
</head>
<body>
    <div id='productsList'>
        <button onclick="updateItem(1, 0, 10)">Remove</button>
        <button onclick="updateItem(1, 1, 10)">Add</button>
        <button onclick="sendCart()">Send</button>
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