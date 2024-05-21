<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
    <script src="js/global.js"></script>
    <script src="js/cart.js"></script>
</head>
<body>
    <div id='productsList'>
        <button onclick="updateItem(1, 0, 10)">Remove 1</button>
        <button onclick="updateItem(1, 1, 10)">Add 1</button>
        <button onclick="updateItem(2, 0, 10)">Remove 2</button>
        <button onclick="updateItem(2, 1, 10)">Add 2</button>
    </div>

    <button onclick="sendCart()">Send</button>


    <script>
        fetch("./sys/api/products/list.php")
        .then(e=>e.json())
        .then(e=>{
            for(let i of e.mensagem){
                let id = i.id;
                let name = i.name;
                let price = i.price;
                let image = i.image;
                let quant = i.quant;

                productsList.innerHTML += `
                    <div class='item-out'>
                        <h1>${name}</h1>
                        <div class='img-out'>
                            <img src='./sys/api/images/products/${image}'>
                        </div>
                        <p>R$${price}</p>
                        <button onclick='updateItem(${id}, 1, ${quant})'>Adicionar</button>
                    </div>
                `;
            }
        })
    </script>
</body>
</html>