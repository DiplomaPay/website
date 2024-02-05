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

        <div id='myrooms_list' class="salas">
            <!-- <div class="sala">
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
            
        -->
           
            <div id="entrarSala" class="entrarSala sala">
                <p>Entrar em uma sala</p>
            </div>
           <button class="criar" id="criarSala">+ Criar turma</button>

        </div>
        
    </section>
    <dialog id="modalEntrarSala">
        <h1>Código da sala </h1>
        <input id='join_room_name' type="text" placeholder="EX:AB1C2D">
        <button onclick="sendjoinRoom()">Entrar</button>
        <a id="voltarEntrarSala" href="">Voltar</a>
        <p id='res_join_room'></p>

    </dialog>

    <dialog id="modalCriarSala">
        <h1>Criar sala</h1>
        <input type="text" id='room_name' placeholder="Nome da sala">
        <br>
        <p>Digite <span>"Concordo"</span> para aceitar nossos <a href="#">Termos de uso</a></p>
        <button onclick="sendCreateRoom()">Criar</button>
        <a id="voltarCriarSala" href="#">Voltar</a>
        <p id='res_create_room'></p>    
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


        const room_name = document.getElementById("room_name");
	    const sendCreateRoom= () => {
            console.log("a");
			let data = {
				room_name: room_name.value,
				assinatura: "concordo"
			}
            
	        fetch("https://diplomapay.com/sys/room/create.php", {
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_create_room.innerText = JSON.stringify(e);
				myrooms();
                const salaList = document.querySelectorAll('.sala');
                 salaList[salaList.length - 1].classList.add('salaAdmin');
	        })  
	    }
        const join_room_name = document.getElementById("join_room_name");
	    const sendjoinRoom= () => {
			let data = {
				room_code: join_room_name.value,
			}

	        fetch("https://diplomapay.com/sys/room/join.php", {
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_join_room.innerText = JSON.stringify(e);
				myrooms();
	        })
	    }

        const myrooms = (e) => {

        fetch("https://diplomapay.com/sys/room/list.php")
        .then(e=>e.json())
        .then(e=>{
            myrooms_list.innerHTML = "";
            let data = e;
            console.log(data)
            for(let i = 0; i < data.length; i++){
                myrooms_list.innerHTML += `
                    <div class="sala"><h2>${data[i].room_name}</h2> <div class="qtnAlunos info"<p>N</p><p>Alunos></div><div class="qtnSaldo info"><p>R$${data[i]}</p><p>Saldo</p></div><button>Entrar no painel</button></div>
                `;
            }
        })
        }

        myrooms();



    
    </script>
</body>
</html>