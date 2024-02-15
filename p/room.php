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
        <div class="teste">
            <img src="../items/img/IconBranco.svg" alt="DiplomaPay Logo" class = "logo">
            <div>
                <div class="atual">
                    <img src="" alt="">
                    <a>Salas</a>
                </div>
                <div>
                    <img src="" alt="">
                    <a>Usuário</a>
                </div>
                <div>
                    <img src="" alt="">
                    <a>Configurações</a>
                </div>
                <div id="entrarSala" class="entrarSala">
                    <img src="" alt="">    
                    <p>Entrar em uma sala</p>
                </div>
                <div class="criar" id="criarSala">
                    <img src="" alt="">    
                    <p>+ Criar turma</p>
                </div>
            </div>
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
            <div class="sala">
                <!-- <button>
                    Entrar em uma sala
                </button>
                <p>OU</p>
                <p>+ Crie sua própria sala</p> -->
            </div>
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
            modalEntrarSala.showModal();
            console.log("bbbb");
    
        }
    
        voltarEntrarSala.onclick = function(){
            modalEntrarSala.close()
            window.location.reload()
        }

        document.addEventListener('click', function (event) {
            if (event.target === modalEntrarSala) {
                modalEntrarSala.close();
                window.location.reload()
            }
        });



        const buttonCriarSala = document.querySelector('#criarSala');
        const modalCriarSala = document.querySelector('#modalCriarSala');
        const voltarCriarSala = document.querySelector('#voltarCriarSala');

        buttonCriarSala.onclick = function () {
            modalCriarSala.showModal();
            console.log("aaaa");
        };

        voltarCriarSala.onclick = function () {
            modalCriarSala.close();
            window.location.reload()
        };

        document.addEventListener('click', function (event) {
            if (event.target === modalCriarSala) {
                modalCriarSala.close();
                window.location.reload()
            }
        });
        

        const room_name = document.getElementById("room_name");
        const salaAdmin = document.querySelector(".sala")
	    const sendCreateRoom= () => {
            console.log("a");
			let data = {
				room_name: room_name.value,
				assinatura: "concordo",
                token: localStorage.token
			}
            
	        fetch("https://diplomapay.com/sys/room/create.php", {
	            method: "POST",
	            body: JSON.stringify(
                    data
                ),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_create_room.innerText = JSON.stringify(e);
                salaAdmin.classList.add('sala salaAdmin') = JSON.stringify(e);
				myrooms();
                reloadPage();
                
	        })  
	    }
        const join_room_name = document.getElementById("join_room_name");
	    const sendjoinRoom= () => {
			let data = {
				room_code: join_room_name.value,
                token: localStorage.token   
			}

	        fetch("https://diplomapay.com/sys/room/join.php", {
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_join_room.innerText = JSON.stringify(e);
				myrooms();
                reloadPage();
	        })
	    }

        const myrooms = (e) => {
            fetch("https://diplomapay.com/sys/room/list.php",{
                method: "POST",
                body: JSON.stringify({
                    token: localStorage.token
                })
            })
            .then(e => e.json())
            .then(e => {
                let data = e;
                console.log(data);

                myrooms_list.innerHTML = "";

                for (let i = 0; i < data.length; i++) {
                    myrooms_list.innerHTML += `
                        <div class="sala ${data[i].typeuser_bool}">
                            <h2>${data[i].room_name}</h2>
                            <div class="qtnAlunos info">
                                <p>${data[i].user_room}</p>
                                <p>Alunos</p>
                            </div>
                            <div class="qtnSaldo info">
                                <p>R$${data[i].ammount_room}</p><p>Saldo</p>
                            </div>
                            <button>Entrar no painel</button>
                        </div>
                    `;
                }
                
            });
          
        };


        myrooms();




    
    </script>
</body>
</html>