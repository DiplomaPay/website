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
    <a href='payment.php'>Ir para pagamento</a>

    <div id='productsList'>
    </div>



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
                            <img style='max-width: 100px' src='./sys/api/images/products/${image}'>
                        </div>
                        <p>R$${price}</p>
                        <button onclick='updateItem(${id}, '${name}', 1, ${quant}, ${price})'>Adicionar</button>
                    </div>
                `;
            }
        })
    </script>
</body>
</html>