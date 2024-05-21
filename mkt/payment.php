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

    <button onclick="newPayment()">Gerar pagamento</button>

    <img id="payimg" src='#'>
    <p id='paycodepix'></p>
    <p id='payprice'></p>
    <p id='paycode'></p>

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

        async function newPayment(){
            let local = 'orders/new.php';
            let infos = await addNewData(local, { items: cart});

            let data = infos.mensagem;

            payimg.src = data.base64;
            paycodepix.innerHTML = data.code_pix;
            payprice.innerHTML = `R$${data.ammount}`;
            paycode.innerHTML = `#${data.code}`;

            console.log(infos);
            console.log(data);
        }
    </script>
</body>
</html>