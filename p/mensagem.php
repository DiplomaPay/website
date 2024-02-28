
<?php
include"../sys/conexao.php";
justLog($__EMAIL__);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../items/css/mensagem.css">
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
                <div class="atual">
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
                <div>
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

        <div class="titulo">
            <h1>Recado</h1>
            <p>Criado por Nome do Admin</p>
        </div>

        <div class="mensagem">
            <h2>Titulo da mensagem</h2>
            <div class="conteudo">
                <p>
                    Galerinha, teste de nova mensagem!
                    <br>
                    <br>
                    Lorem ipsum dolor sit amet. Eos mollitia suscipit sit veniam accusantium qui rerum voluptas est expedita iusto. Sit voluptas explicabo vel amet itaque ut praesentium enim a quibusdam nihil aut voluptate nobis aut autem aliquam qui adipisci dolore. Rem nihil facere aut autem suscipit ut consectetur fuga et incidunt autem aut consequatur numquam aut tempore officia.
                    Quo eaque velit aut voluptatum sint et molestiae vero quo facere placeat? Vel exercitationem reprehenderit est molestiae nihil ab suscipit eaque ut quia modi. Id cumque omnis et perferendis dolor aut laudantium quasi et amet dicta.
                    <br>
                    Eum itaque veniam et repellat ullam vel voluptas sint eum doloribus internos aut aspernatur quod. Et facere officia aut quas perferendis cum praesentium ipsam in rerum dignissimos eum dolor dolores. Quo ipsum quisquam sit odio mollitia vel delectus harum rem quibusdam explicabo et aspernatur perferendis et labore omnis eum obcaecati sunt!
                </p>
                <!-- <div class="reacao">
                    <div id="like">
                        <img src="../items/img/likeCinza.svg" alt="" onclick="like()">
                        <p>0</p>
                    </div>
                    <div id="dislike">
                        <img src="../items/img/dislikeCinza.svg" alt="" onclick="dislike()">
                        <p>0</p>
                    </div>
                    <div id="comentario">
                        <img src="../items/img/comentarioCinza.svg" alt="" onclick="comentario()">
                        <p>0</p>
                    </div>
                </div> -->
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


        // let likeCount = 0;
        // let dislikeCount = 0;
        // let comentarioCount = 0;

        // function like() {
        //     const likeElement = document.getElementById('like');
        //     const dislikeElement = document.getElementById('dislike');

        //     if (likeElement.querySelector('img').src.includes('Cinza')) {
        //         likeCount++;
        //         likeElement.querySelector('img').src = '../items/img/likeVerde.svg';
        //         likeElement.querySelector('p').innerText = likeCount;

        //         if (dislikeElement.querySelector('img').src.includes('Vermelho')) {
        //             dislikeElement.querySelector('img').src = '../items/img/dislikeCinza.svg';
        //             dislikeCount--;
        //             dislikeElement.querySelector('p').innerText = dislikeCount;
        //         }
        //     } else {
        //         likeElement.querySelector('img').src = '../items/img/likeCinza.svg';
        //         likeCount--;
        //         likeElement.querySelector('p').innerText = likeCount;
        //     }
        // }

        // function dislike() {
        //     const dislikeElement = document.getElementById('dislike');
        //     const likeElement = document.getElementById('like');

        //     if (dislikeElement.querySelector('img').src.includes('Cinza')) {
        //         dislikeCount++;
        //         dislikeElement.querySelector('img').src = '../items/img/dislikeVermelho.svg';
        //         dislikeElement.querySelector('p').innerText = dislikeCount;

        //         if (likeElement.querySelector('img').src.includes('Verde')) {
        //             likeElement.querySelector('img').src = '../items/img/likeCinza.svg';
        //             likeCount--;
        //             likeElement.querySelector('p').innerText = likeCount;
        //         }
        //     } else {
        //         dislikeElement.querySelector('img').src = '../items/img/dislikeCinza.svg';
        //         dislikeCount--;
        //         dislikeElement.querySelector('p').innerText = dislikeCount;
        //     }
        // }

        // function comentario() {
        //     const comentarioElement = document.getElementById('comentario');
        //     comentarioCount++;
        //     comentarioElement.querySelector('img').src = '../items/img/comentarioAzul.svg';
        //     comentarioElement.querySelector('p').innerText = comentarioCount;
        // }

    </script>
</body>
</html>