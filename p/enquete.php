
<?php
include"../sys/conexao.php";
justLog($__EMAIL__);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../items/css/enquete.css">
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
            <h1>Enquete</h1>
            <p>Criado por Nome do Admin</p>
        </div>

        <div class="mensagem">
            <h2>Titulo da Enquete</h2>
            <div class="conteudo">
                <p>
                    Galerinha, teste de nova mensagem!
                    <br>
                    <br>
                    Lorem ipsum dolor sit amet. Eos mollitia suscipit sit veniam accusantium qui rerum voluptas est expedita iusto. Sit voluptas explicabo vel amet itaque ut praesentium enim a quibusdam nihil aut voluptate nobis aut autem aliquam qui adipisci dolore. Rem nihil facere aut autem suscipit ut consectetur fuga et incidunt autem aut consequatur numquam aut tempore officia.
                    Quo eaque velit aut voluptatum sint et molestiae vero quo facere placeat? Vel exercitationem reprehenderit est molestiae nihil ab suscipit eaque ut quia modi. Id cumque omnis et perferendis dolor aut laudantium quasi et amet dicta.
                </p>
                <div class="reacao">
                    <div id="quantidadeVotos">
                        <img src="../items/img/pessoa.svg" alt="" onclick="like()">
                        <p id="pVotos">32</p>
                    </div>
                    <!-- <div id="comentario">
                        <img src="../items/img/comentarioCinza.svg" alt="" onclick="dislike()">
                        <p>2</p>
                    </div> -->
                    <div id="tempo">
                        <img src="../items/img/relogio.svg" alt="" onclick="comentario()">
                        <p>XX:XX:XX:XX</p>
                    </div>
                </div>
            </div>
            <div class="votacao">
                <div class="botoes">
                    <button id="opcao1Button" onclick="opcao1()">Opção 1</button>
                    <button id="opcao2Button" onclick="opcao2()">Opção 2 só que maior</button>
                    <button id="opcao3Button" onclick="opcao3()">Da para ter mais opções?</button>                </div>
                <div class="bar">
                    <div class="barDiv" id='spanOpcao1'>
                        <span class="barSpan"></span>
                        <span class="tooltip"></span>
                    </div>

                    <div  class="barDiv" id='spanOpcao2'>
                        <span class="barSpan" ></span>
                        <span class="tooltip"></span>
                    </div>

                    <div  class="barDiv" id='spanOpcao3'>
                        <span class="barSpan" ></span>
                        <span class="tooltip">
                        <div>
                            <p class="porcentagem">5%</p>
                            <p>10<span>votos</span></p>

                        </div>
                        </span>
                    </div>
                </div>
            </div>
            <p class="preferido"></p>
          
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

        window.addEventListener('load', () => {
            const reacaoDiv = document.querySelector('.reacao');
            function atualizarPosicaoReacao() {
            const larguraConteudo = reacaoDiv.scrollWidth;
            reacaoDiv.style.right = `calc(-${larguraConteudo}px - 2vw)`;
            }
            atualizarPosicaoReacao();
            function onConteudoAlterado() {
            atualizarPosicaoReacao();
            }
        });

        opcao1Button = document.getElementById('opcao1Button')
        opcao2Button = document.getElementById('opcao2Button')
        opcao3Button = document.getElementById('opcao3Button')

        opcao1 = () =>{
            opcao1Button.style.backgroundColor = 'var(--azul)'
            opcao2Button.style.backgroundColor = 'var(--cinzaClaro)'
            opcao3Button.style.backgroundColor = 'var(--cinzaClaro)'
        }
        opcao2 = () =>{
            opcao1Button.style.backgroundColor = 'var(--cinzaClaro)'
            opcao2Button.style.backgroundColor = 'var(--vermelho)'
            opcao3Button.style.backgroundColor = 'var(--cinzaClaro)'
        }
        opcao3 = () =>{
            opcao2Button.style.backgroundColor = 'var(--cinzaClaro)'
            opcao1Button.style.backgroundColor = 'var(--cinzaClaro)'
            opcao3Button.style.backgroundColor = 'var(--verde)'
        }

        let votos = [15, 35, 3]
        let votosTotais = votos.reduce((acc, e) => {
            acc += e
            return acc;
        })     
        let porcentagem = votos.map(e =>{
            return ((e/votosTotais)*100).toFixed(1)
        })

        let span = document.querySelectorAll('.barDiv')
        const spanArray = Array.from(span);

        if (votos[0] === 0 & votos[2] === 0){
            spanArray[1].style.borderRadius = '25px'
        } 
        else if (votos[0] === 0){
            spanArray[1].style.borderRadius = '25px 0 0 25px';
        }
         else if (votos[3] === 0){
            spanArray[1].style.borderRadius = '0 25px 25px 0'
        }

        if (votos[0] === 0 & votos[1] === 0){
            spanArray[2].style.borderRadius = '25px'
        }
        if (votos[2] === 0 & votos[1] === 0){
            spanArray[0].style.borderRadius = '25px'
        }
       

        spanArray.forEach((e, i) => {
            e.style.width = `${porcentagem[i]}%`
        });

        let maiorIndex = votos.reduce((acc, e, index, array) => {
            return e > array[acc] ? index : acc;
        }, 0);
       
        let preferido = document.querySelector('.preferido');
        preferido.innerHTML = `<span>${porcentagem[maiorIndex]}%</span> dos participantes preferem "<span>${document.getElementById('opcao' + (maiorIndex + 1) + 'Button').textContent}</span>" com um total de <span>${votos[maiorIndex]}</span> votos.`;

        spanTexto = document.querySelectorAll('.preferido span')
        spanTextoArray = Array.from(spanTexto)

        spanTextoArray.forEach(e => {
            if (maiorIndex === 0){
                e.style.color = 'var(--azul)'
            } else if (maiorIndex === 1){
                e.style.color = 'var(--vermelho)'
            } else if (maiorIndex === 2){
                e.style.color = 'var(--verde)'
            }
        });

        document.getElementById('pVotos').textContent = votosTotais;


        var tooltip = document.querySelectorAll('.tooltip')
        tooltipArray = Array.from(tooltip);
  

      

        tooltipContent = tooltipArray.map((e, i) => {
            e.innerHTML = `
            <div>
                <p class="porcentagem paragrafo">${porcentagem[i]}%</p>
                <br>
                <p class="paragrafo">${votos[i]}</p><span>votos</span>
            </div>
            `
            const paragrafo = e.querySelectorAll('.paragrafo')

            paragrafo.forEach(element => {
                if (i === 0){
                element.style.color = 'var(--azul)'
            } else if (i === 1){
                element.style.color = 'var(--vermelho)'
            } else if (i === 2){
                element.style.color = 'var(--verde)'
            }
            });
           
           
        })
</script>
</body>
</html>