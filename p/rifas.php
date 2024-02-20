
<?php
include"../sys/conexao.php";
justLog($__EMAIL__);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../items/css/rifas.css">
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
                <div class="atual">
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

        <div class="title">
               <h1></h1>
        </div>
        
        <div class="rifasDados">
            <h2>Rifas</h2>
            <div class="rifasDadosGrid">
                <div class="rifasDadoGrid">
                    <h3>Números vendidos</h3>
                    <p>22</p>
                </div>
                <div class="rifasDadoGrid">
                    <h3>Total arrecadado</h3>
                    <p>R$ 44,00</p>
                </div>
                <div class="rifasDadoGrid turma">
                    <h3>Total de rifas</h3>
                    <p class="turma">42</p>
                    <p class="total">R$ 84,00 - 6 clientes</p>
                </div>
            </div>
        </div>

        <div class="botoes">
            <button>+ Vender rifa</button>
            <a href="">Copiar link</a>
        </div>

        <div class="listaRifas">
            <h2>Suas vendas -<span> 2 clientes</span></h2>

            <div class="legendaLista">
                <p>Nome</p>
                <p>Quantidade</p>
                <p>Total</p>
                <p>Rifa</p>
                <p>Informações</p>
                <p>Data</p>
                <p>Status</p>
            </div>
            <div class="listas">
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Ana</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Enzo</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Venus</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Cairé</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Jaiza</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Bernardo</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Joao</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div> <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>

                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
                <div class="lista">
                    <p>Tite</p>
                    <p>7 unidades</p>
                    <p>R$14,00</p>
                    <p>Iphone 13</p>
                    <a>Ver mais</a>
                    <p>00/00/0000</p>
                    <p></p>
                </div>
            </div>
            <div class="pagination">
                <ul>
                    <!-- <li class="btn"><<</li>
                    <li class="numb atualPagination">1</li>
                    <li class="numb">2</li>
                     <li class="dots">...</li>
                    <li class="numb">4</li>
                    <li class="numb">5</li>
                    <li class="dots">...</li>
                    <li class="numb">7</li>
                    <li class="btn">>></li> -->

                </ul>
            </div>

            <div class="rifas">
                <h2>Rifas da sala</h2>
                <div class="gridRifas">
                    <div class="rifa">
                        <h4>Nome</h4>
                        <img src="../items/img/celular.png" alt="">
                        <p>Preço</p>
                        <button>Ver informações</button>
                    </div>
                    <div class="rifa">
                        <h4>Nome</h4>
                        <img src="../items/img/caixa.png" alt="">
                        <p>Preço</p>
                        <button>Ver informações</button>
                    </div>
                    <div class="rifa">
                        <h4>Nome</h4>
                        <img src="../items/img/caixa.png" alt="">
                        <p>Preço</p>
                        <button>Ver informações</button>
                    </div>
                    <div class="rifa">
                        <h4>Nome</h4>
                        <img src="../items/img/caixa.png" alt="">
                        <p>Preço</p>
                        <button>Ver informações</button>
                    </div>
                    <div class="rifa">
                        <h4>Nome</h4>
                        <img src="../items/img/caixa.png" alt="">
                        <p>Preço</p>
                        <button>Ver informações</button>
                    </div>
                    <div class="rifa">
                        <h4>Nome</h4>
                        <img src="../items/img/caixa.png" alt="">
                        <p>Preço</p>
                        <button>Ver informações</button>
                    </div>
                    <div class="rifa">
                        <h4>Nome</h4>
                        <img src="../items/img/caixa.png" alt="">
                        <p>Preço</p>
                        <button>Ver informações</button>
                    </div>
                </div>
                
            </div>

        </div>
            
    </section>
    <button class="question">?</button>
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

        const lista = document.querySelectorAll(".lista");
        const itemsPerPage = 3;
        let currentPage = 1;

        function showItems(page) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            lista.forEach((item, index) => {
                if (index >= startIndex && index < endIndex) {
                    item.style.display = "grid";
                } else {
                    item.style.display = "none";
                }
            });
        }

        function updatePagination(totalPages) {
            const ulTag = document.querySelector("ul");
            let liTag = '';

            for (let i = 1; i <= totalPages; i++) {
                liTag += `<li class="numb ${currentPage === i ? 'atualPagination' : ''}" onclick="changePage(${i})"><span>${i}</span></li>`;
            }

            ulTag.innerHTML = liTag;
        }

        function changePage(page) {
            currentPage = page;
            showItems(currentPage);
            updatePagination(Math.ceil(lista.length / itemsPerPage));
            element(Math.ceil(lista.length / itemsPerPage), currentPage);
        }

        function element(totalPages, page) {
            const ulTag = document.querySelector("ul");
            let liTag = '';
            let activeLi;
            let beforePages = page - 1;
            let afterPages = page + 1;

            if (page > 1) {
                liTag += `<li class="btn" onclick="changePage(${page - 1})"><<</li>`;
            }
            if (page > 2) {
                liTag += `<li class="numb" onclick="changePage(1)">1</li>`;
                if (page > 3) {
                    liTag += `<li class="dots">...</li>`;
                }
            }

            for (let pageLength = beforePages; pageLength <= afterPages; pageLength++) {
                if (pageLength > totalPages) {
                    continue;
                }
                if (pageLength == 0) {
                    pageLength = pageLength + 1;
                }

                if (page == pageLength) {
                    activeLi = "atualPagination";
                } else {
                    activeLi = "";
                }
                liTag += `<li class="numb ${activeLi}" onclick="changePage(${pageLength})"><span>${pageLength}</span></li>`;
            }

            if (page < totalPages - 1) {
                if (page < totalPages - 2) {
                    liTag += `<li class="dots">...</li>`;
                }
                liTag += `<li class="numb" onclick="changePage(${totalPages})">${totalPages}</li>`;
            }

            if (page < totalPages) {
                liTag += `<li class="btn" onclick="changePage(${page + 1})">>></li>`;
            }

            ulTag.innerHTML = liTag;
        }

        showItems(currentPage);
        updatePagination(Math.ceil(lista.length / itemsPerPage));
        element(Math.ceil(lista.length / itemsPerPage), currentPage);
    </script>
</body>
</html>