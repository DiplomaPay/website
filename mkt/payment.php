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
    <br>

    <img id="payimg" src='#' style="max-width: 100px">
    <p id='paycodepix'></p>
    <p id='payprice'></p>
    <p id='paycode'></p>

    <button onclick='verifyPayment()'>Verificar pagamento</button>

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
        let code = "";
        async function newPayment(){
            let local = 'orders/new.php';
            let infos = await addNewData(local, { items: cart});

            let data = infos.mensagem;

            payimg.src = `data:image/jpeg;base64,${data.base64}`;
            paycodepix.innerHTML = data.code_pix;
            payprice.innerHTML = `R$${data.ammount}`;
            paycode.innerHTML = `#${data.code}`;

            code = data.code;

            console.log(infos);
            console.log(data);
        }

        function verifyPayment(){
            let infos = addNewData('payment/verify.php', {code: code});
            
            let data = infos.mensagem;
            console.log(data);
        }
    </script>
</body>
</html>