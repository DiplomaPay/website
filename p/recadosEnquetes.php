
<?php
include"../sys/conexao.php";
justLog($__EMAIL__);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../items/css/recadosEnquetes.css">
  <link rel="stylesheet" href="../items/css/global.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <title>ash</title>
</head>
<body>
<section class="sidebar">
        <div class="teste">
            <img src="../items/img/IconBranco.svg" alt="DiplomaPay Logo" class = "logo" onclick="location.href='./room.php'">
            <div>
                <div>
                    <img src="" alt="">
                    <a href="./dashboard.php">Visão geral</a>
                </div>
                <div>
                    <img src="" alt="">
                    <a href="./rifas.php">Rifas</a>
                </div>
                <div>
                    <img src="" alt="">
                    <a href="./relatorios.php">Relatórios</a>
                </div>
                <div class="atual">
                    <img src="" alt="">
                    <a href="./recadosEnquetes.php">Recados e enquetes</a>
                </div>
                <div>
                    <img src="" alt="">
                    <a href="./carteira.php">Sua carteira</a>
                </div>
                <div class="entrarSala">
                    <img src="" alt="">    
                    <a href="./room.php">Turmas</a>
                </div>
            
            </div>
            </div>

        </div>
    </section>
    <section class="main">
        <header>
            <div>
                <h2>Bem vindo(a), <span>Fulano Ciclano</span>!</h2>
            </div>
            <img src="../items/img/profile.jpeg" alt="" class="userImage">
        </header>

        <div class="title">
               <h1></h1>
        </div>
        <div class="notaContribuinte">
            <h3>Vocé é um contribuinte nota:</h3> 
            <span class="nota">B</span>
            <br>
            <h4>(Coloque <span>R$8,94</span> e vire contribuinte nota <span>A</span>. Sua parte ficaria em <span>R$544,68</span>)</h4>
        </div>

        <div class="enquete">
            <div>
                <h3>Tem uma enquete acontecendo!</h3>
                <img src="../items/img/estrelinha.svg" alt="" class="estrelinha">
            </div>
            <div>
                <p>Devemos gastar a grana no cassino?</p>
            </div>
            <div>
                <button>Votar agora</button>
                <p>Acaba em 19 minutos</p>
            </div>
        </div>
        <div class="mensagem">
                <h3>Nova mensagem</h3>
                <h4>Galerinha, teste de nova mensagem!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel mollis libero, a ornare lectus. Sed efficitur in lectus nec porta. Sed varius tellus in justo cursus...</p>
                <button>Ver completo</button>
        </div>

        <div class="suaSala">
            <h3>Sua sala -</h3>
            <a>Ver relatório</a>
            <div class="grid">
                <div>
                    <h4>Total guardado</h4>
                    <p>R$ 12.244,96</p>
                </div>
                <div class="pessoal">
                    <h4>Sua parte</h4>
                    <p>R$ 385,83</p>
                </div>
                <div class="pessoal">
                    <h4>Suas constribuições</h4>
                    <p>R$ 129,33</p>
                </div>
                <div>
                    <h4>Pessoas na sala</h4>
                    <p>36</p>
                </div>
                <div>
                    <h4>Total de clientes</h4>
                    <p>6</p>
                </div>
                <div class="pessoal">
                    <h4>Contribuição média</h4>
                    <p>R$ 138,27</p>
                </div>
            </div>
            <div class="graphic">
                <h3>Titulo</h3>
                <div class="graphicImage">

                </div>
            </div>
        </div>
        <button class="question">?</button>
    </section>
    <script>
        const selectedRoomCode = localStorage.getItem('selectedRoomCode');
        if (selectedRoomCode !== null && selectedRoomCode !== undefined) {
            fetch("https://diplomapay.com/sys/room/infos.php", {
                method: "POST",
                body: JSON.stringify({
                    room_code: selectedRoomCode,
                    token: localStorage.token
                }),
            })
            .then(infoResponse => infoResponse.json())
            .then(infoData => {
                console.log(infoData);
                const h1Turma = document.querySelector('.title h1');
                h1Turma.innerText = infoData.room_name;
            });
        }
    </script>
</body>
</html>