<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <script src="js/global.js"></script>
    <script src="js/cart.js"></script>
</head>
<body>
    Lista de itens

    <div id='lista'>

    </div>

    <button onclick="sendCart()">Gerar pagamento</button>

    <script>
        for(let i of cart){
            lista.innerHTML += `
                <div class='lista-out'>
                    <h1>${i.name}</h1>
                    <p>Quantidade: ${i.quant}</p>
                    <p>total: ${i.quant * i.price}</p>
                </div>
            `;
        }
    </script>
</body>
</html>