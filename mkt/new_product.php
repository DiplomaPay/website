<!-- Adicionar novo produto (ADM) -->
<!-- colocar justlog  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='./js/global.js'></script>
    <title>Document</title>
</head>
<body>
    <form action="javascript:void(0)" onSubmit='addNewProduct()'>
        <input type='text' id='nameAdd' placeholder='Nome'>
        <input type='text' id='descAdd' placeholder='descrição'>
        <input type='number' step="0.01" id='priceAdd' placeholder='Valor'>
        <input type='number' step='1' id='quantAdd' placeholder='quantidade'>
        <input type='file' id='imageAdd' accept="image/jpeg, image/jpg, image/png">
        <button>Enviar</button>
    </form>

    <script>
        const addNewProduct = async () => {
            let name = nameAdd.value;
            let desc = descAdd.value;
            let price = priceAdd.value;
            let quant = quantAdd.value;

            let image = imageAdd.files[0];

            let base64 = false;
            if(image){
                base64 = await getBase64(image);
            }

            addNewData("products/add.php", {
                name: name,
                desc: desc,
                price: price,
                quant: quant,
                image: base64
            })

            console.log("Chegou");
        }
    </script>
</body>
</html>