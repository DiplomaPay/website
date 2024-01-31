<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salas</title>
    <link rel="stylesheet" href="../items/css/global.css">
    <link rel="stylesheet" href="../items/css/room.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
</head>
<body>
    <section class="sidebar">
            <img src="../items/img/IconBranco.svg" alt="DiplomaPay Logo" class = "logo">
            <div>
                <div>
                    <img src="" alt="">
                    <p>Salas
                </div>
                <div>
                    <img src="" alt="">
                    <p>Usuário
                </div>
                <div>
                    <img src="" alt="">
                    <p>Configurações
                </div>
            </div>
    </section>

    <section class="main">
        <div class="header">
            <h1>Suas turmas</h1>
            <h4>Aluno</h4>
            <h4 class="adminSquare">Admin</h4>
        </div>

        <div class="salas">
            <div class="sala">
                <h2>Titulo</h2>
                <div class="qtnAlunos info">
                    <p>N</p>
                    <p>Alunos</p>
                </div>
                <div class="qtnSaldo info">
                    <p>R$N</p>
                    <p>Saldo</p>
                </div>
                <button>Entrar no painel</button>
            </div>
            <div class="sala salaAdmin">
                <h2>Titulo</h2>
                <div class="qtnAlunos info">
                    <p>N</p>
                    <p>Alunos</p>
                </div>
                <div class="qtnSaldo info">
                    <p>R$N</p>
                    <p>Saldo</p>
                </div>
                <button>Entrar no painel</button>
            </div>
            <div class="sala">
                <h2>Titulo</h2>
                <div class="qtnAlunos info">
                    <p>N</p>
                    <p>Alunos</p>
                </div>
                <div class="qtnSaldo info">
                    <p>R$N</p>
                    <p>Saldo</p>
                </div>
                <button>Entrar no painel</button>
            </div>
            
       
           
            <div id="entrarSala" class="entrarSala sala">
                <p>Entrar em uma sala</p>
            </div>
           <button class="criar" id="criarSala">+ Criar turma</button>

        </div>
        
    </section>
    <dialog id="modalEntrarSala">
        <h1>Código da sala </h1>
        <input type="text" placeholder="EX:AB1C2D">
        <button>Entrar</button>
        <a id="voltarEntrarSala" href="">Voltar</a>

    </dialog>

    <dialog id="modalCriarSala">
        <h1>Criar sala</h1>
        <input type="text" placeholder="Nome da sala">
        <br>
        <p>Digite <span>"Concordo"</span> para aceitar nossos <a href="#">Termos de uso</a></p>
        <button>Criar</button>
        <a id="voltarCriarSala" href="#">Voltar</a>
        </dialog>
    <script>
        const buttonEntrarSala = document.querySelector('#entrarSala')
        const modalEntrarSala = document.querySelector('#modalEntrarSala')
        const voltarEntrarSala = document.querySelector('#voltarEntrarSala')
    
        buttonEntrarSala.onclick = function (){
            modalEntrarSala.showModal()
    
        }
    
        voltarEntrarSala.onclick = function(){
            modalEntrarSala.close()
        }

        document.addEventListener('click', function (event) {
            if (event.target === modalEntrarSala) {
                modalEntrarSala.close();
            }
        });



        const buttonCriarSala = document.querySelector('#criarSala');
        const modalCriarSala = document.querySelector('#modalCriarSala');
        const voltarCriarSala = document.querySelector('#voltarCriarSala');

        buttonCriarSala.onclick = function () {
            modalCriarSala.showModal();
        };

        voltarCriarSala.onclick = function () {
            modalCriarSala.close();
        };

        document.addEventListener('click', function (event) {
            if (event.target === modalCriarSala) {
                modalCriarSala.close();
            }
        });



    
    </script>
</body>
</html>