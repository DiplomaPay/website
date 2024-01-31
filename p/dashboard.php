
<?php
// include"../sys/conexao.php";
//só consegue entrar logado
// justLog($__EMAIL__);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../items/css/dash.css">
  <link rel="stylesheet" href="../items/css/global.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <title>ash</title>
</head>
<body>
    <section class="sidebar">
        <img src="../items/img/IconBranco.svg" alt="DiplomaPay Logo" class = "logo">
        <div>
            <div>
                <img src="" alt="">
                <p>Controle de ganhos
            </div>
            <div>
                <img src="" alt="">
                <p>Rifas
            </div>
            <div>
                <img src="" alt="">
                <p>Relatórios
            </div>
            <div>
                <img src="" alt="">
                <p>Recados e enquetes
            </div>
            <div>
                <img src="" alt="">
                <p>Sua carteira
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

        <div class="legend">
                <p>Dados da sala</p>
                <p>Seus dados</p>
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
</body>
</html>