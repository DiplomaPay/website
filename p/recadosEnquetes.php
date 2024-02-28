
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
        <div class="recados">
            <h3>Recados</h3> 

            <div class="mensagens">

                <div class="mensagem">
                    <h3>Mensagem</h3>
                    <h4>Galerinha, teste de nova mensagem!</h4>
                    <p class="conteudoMensagem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel mollis libero, a ornare lectus. Sed efficitur in lectus nec porta. Sed varius tellus in justo cursus Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel mollis libero, a ornare lectus. Sed efficitur in lectus nec porta. Sed varius tellus in justo cursus</p>
                    <button onclick="location.href='./mensagem.php'">Ver completo</button>
                </div>
                <div class="mensagem">
                    <h3>Mensagem</h3>
                    <h4>Galerinha, teste de nova mensagem!</h4>
                    <p class="conteudoMensagem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel mollis libero, a ornare lectus. Sed efficitur in lectus nec porta. Sed varius tellus in justo cursus Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel mollis libero, a ornare lectus. Sed efficitur in lectus nec porta. Sed varius tellus in justo cursus</p>
                    <button onclick="location.href='./mensagem.php'">Ver completo</button>
                </div>
                <div class="mensagem">
                    <h3>Mensagem</h3>
                    <h4>Galerinha, teste de nova mensagem!</h4>
                    <p class="conteudoMensagem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel mollis libero, a ornare lectus. Sed efficitur in lectus nec porta. Sed varius tellus in justo cursus Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel mollis libero, a ornare lectus. Sed efficitur in lectus nec porta. Sed varius tellus in justo cursus</p>
                    <button onclick="location.href='./mensagem.php'">Ver completo</button>
                </div>
                <div class="mensagem">
                    <h3>Mensagem</h3>
                    <h4>Galerinha, teste de nova mensagem!</h4>
                    <p class="conteudoMensagem">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel mollis libero, a ornare lectus. Sed efficitur in lectus nec porta. Sed varius tellus in justo cursus Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel mollis libero, a ornare lectus. Sed efficitur in lectus nec porta. Sed varius tellus in justo cursus</p>
                    <button onclick="location.href='./mensagem.php'">Ver completo</button>
                </div>
                
            </div>
            <div class="paginationMensagem">
                <ul class="mensagemUl">
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
            
        </div>

        <div class="votacoes">
            <h3>Enquetes</h3> 

            <div class="enquetes">

                <div class="enquete">
                    <div>
                        <h3>Tem uma enquete acontecendo!</h3>
                        <img src="../items/img/estrelinha.svg" alt="" class="estrelinha">
                    </div>
                    <div>
                        <p>Devemos gastar a grana no cassino?</p>
                    </div>
                    <div>
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
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
                        <button onclick="location.href='./enquete.php'">Votar agora</button>
                        <p>Acaba em 19 minutos</p>
                    </div>
                </div>

                
            </div>
            <div class="paginationEnquete">
                <ul class="enqueteUl">
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


        function limitarTexto(id, limite) {
        var elemento = document.querySelectorAll(".conteudoMensagem");
        elemento.forEach(e => {
            var texto = e.textContent;

            if (texto.length > limite) {
                var novoTexto = texto.substring(0, limite) + "...";
                e.textContent = novoTexto;
            }
        });
        
        }       
         limitarTexto("text", 200);

        


        // ----------Enquete--------------

        const enquete = document.querySelectorAll(".enquete");
        const itemsPerPageEnquete = 3;
        let currentPageEnquete = 1;

        function showItemsEnquete(pageEnquete) {
            const startIndexEnquete = (pageEnquete - 1) * itemsPerPageEnquete;
            const endIndexEnquete = startIndexEnquete + itemsPerPageEnquete;

            enquete.forEach((itemEnquete, indexEnquete) => {
                if (indexEnquete >= startIndexEnquete && indexEnquete < endIndexEnquete) {
                    itemEnquete.style.display = "block";
                } else {
                    itemEnquete.style.display = "none";
                }
            });
        }

        function updatePaginationEnquete(totalPagesEnquete) {
            const ulTagEnquete = document.querySelector(".enqueteUl");
            let liTagEnquete = '';

            for (let i = 1; i <= totalPagesEnquete; i++) {
                liTagEnquete += `<li class="numb ${currentPageEnquete === i ? 'atualPagination' : ''}" onclick="changePageEnquete(${i})"><span>${i}</span></li>`;
            }

            ulTagEnquete.innerHTML = liTagEnquete;
        }

        function changePageEnquete(pageEnquete) {
            currentPageEnquete = pageEnquete;
            showItemsEnquete(currentPageEnquete);
            updatePaginationEnquete(Math.ceil(enquete.length / itemsPerPageEnquete));
            elementEnquete(Math.ceil(enquete.length / itemsPerPageEnquete), currentPageEnquete);
        }

        function elementEnquete(totalPagesEnquete, pageEnquete) {
            const ulTagEnquete = document.querySelector(".enqueteUl");
            let liTagEnquete = '';
            let activeLiEnquete;
            let beforePagesEnquete = pageEnquete - 1;
            let afterPagesEnquete = pageEnquete + 1;

            if (pageEnquete > 1) {
                liTagEnquete += `<li class="btn" onclick="changePageEnquete(${pageEnquete - 1})"><<</li>`;
            }
            if (pageEnquete > 2) {
                liTagEnquete += `<li class="numb" onclick="changePageEnquete(1)">1</li>`;
                if (pageEnquete > 3) {
                    liTagEnquete += `<li class="dots">...</li>`;
                }
            }

            for (let pageLengthEnquete = beforePagesEnquete; pageLengthEnquete <= afterPagesEnquete; pageLengthEnquete++) {
                if (pageLengthEnquete > totalPagesEnquete) {
                    continue;
                }
                if (pageLengthEnquete == 0) {
                    pageLengthEnquete = pageLengthEnquete + 1;
                }

                if (pageEnquete == pageLengthEnquete) {
                    activeLiEnquete = "atualPagination";
                } else {
                    activeLiEnquete = "";
                }
                liTagEnquete += `<li class="numb ${activeLiEnquete}" onclick="changePageEnquete(${pageLengthEnquete})"><span>${pageLengthEnquete}</span></li>`;
            }

            if (pageEnquete < totalPagesEnquete - 1) {
                if (pageEnquete < totalPagesEnquete - 2) {
                    liTagEnquete += `<li class="dots">...</li>`;
                }
                liTagEnquete += `<li class="numb" onclick="changePageEnquete(${totalPagesEnquete})">${totalPagesEnquete}</li>`;
            }

            if (pageEnquete < totalPagesEnquete) {
                liTagEnquete += `<li class="btn" onclick="changePageEnquete(${pageEnquete + 1})">>></li>`;
            }

            ulTagEnquete.innerHTML = liTagEnquete;
        }

        showItemsEnquete(currentPageEnquete);
        updatePaginationEnquete(Math.ceil(enquete.length / itemsPerPageEnquete));
        elementEnquete(Math.ceil(enquete.length / itemsPerPageEnquete), currentPageEnquete);

        // ---------------- Pagination -----------------

                
        const mensagem = document.querySelectorAll(".mensagem");
        const itemsPerPage = 3;
        let currentPage = 1;

        function showItems(page) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;

            mensagem.forEach((item, index) => {
                if (index >= startIndex && index < endIndex) {
                    item.style.display = "flex";
                } else {
                    item.style.display = "none";
                }
            });
        }

        function updatePagination(totalPages) {
            const ulTag = document.querySelector(".mensagemUl");
            let liTag = '';

            for (let i = 1; i <= totalPages; i++) {
                liTag += `<li class="numb ${currentPage === i ? 'atualPagination' : ''}" onclick="changePage(${i})"><span>${i}</span></li>`;
            }

            ulTag.innerHTML = liTag;
        }

        function changePage(page) {
            currentPage = page;
            showItems(currentPage);
            updatePagination(Math.ceil(mensagem.length / itemsPerPage));
            element(Math.ceil(mensagem.length / itemsPerPage), currentPage);
        }

        function element(totalPages, page) {
            const ulTag = document.querySelector("mensagemUl");
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
        updatePagination(Math.ceil(mensagem.length / itemsPerPage));
        element(Math.ceil(mensagem.length / itemsPerPage), currentPage);



    </script>
</body>
</html>