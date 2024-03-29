<?php
include"../sys/conexao.php";
justLog($__EMAIL__);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../items/css/relatorios.css">
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
            <img src="../items/img/IconBranco.svg" alt="DiplomaPay Logo" class="logo" onclick="location.href='./room.php'">
            <div>
                <div>
                    <img src="" alt="">
                    <a href="./dashboard.php">Visão geral</a>
                </div>
                <div>
                    <img src="" alt="">
                    <a href="./rifas.php">Rifas</a>
                </div>
                <div class="atual">
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
        <div class="notaContribuinte">
            <h3>Vocé é um contribuinte nota:</h3>
            <span class="nota">B</span>
            <br>
            <h4>(Coloque <span>R$8,94</span> e vire contribuinte nota <span>A</span>. Sua parte ficaria em <span>R$544,68</span>)</h4>
        </div>
        <div class="botoes">
            <button class="salaButton relatorioAtual" onclick="ativar(this)">Relatório da sala</button>
            <button class="voceButton" onclick="ativar(this)">Meu relatório</button>
        </div>
        <div class="sala">
            <div class="infoRelatorio">
                <div class="infoRelatorioGrid infoRelatorioSala">
                    <div>
                        <h3>Total guardado</h3>
                        <p>R$ 12.244,96</p>
                    </div>
                    <div>
                        <h3>Últimos 6 meses</h3>
                        <p>R$ 5.865,37</p>
                    </div>
                    <div>
                        <h3>Esse mês</h3>
                        <p>R$ 1227,54</p>
                    </div>
                    <div>
                        <h3>Gastos totais</h3>
                        <p>R$ 1.314,76</p>
                    </div>
                    <div>
                        <h3>Gastos últimos 6 meses</h3>
                        <p>R$ 367,12</p>
                    </div>
                    <div>
                        <h3>Gastos esse mês</h3>
                        <p>R$ 20,00</p>
                    </div>

                </div>

        
            </div>
            <div class="listaExtratos">
                <!-- <h2>Suas vendas -<span> 2 clientes</span></h2> -->
                <h2>Extrato da turma</h2>

                <div class="legendaLista">
                    <p>Nome</p>
                    <p>Valor</p>
                    <p>Tipo</p>
                    <p>Data</p>

                </div>
                <div class="listas">
                    <div class="extrato">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>

                    </div>
                    <div class="extrato">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>12/04/50BCE</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>29/04/2005</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>12/04/50BCE</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>29/04/2005</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>12/04/50BCE</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>29/04/2005</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extrato">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
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

                <button class="imprimir">Imprimir relatório completo</button>


            </div>
            <div class="graficos">
                <h2>Lucros da turma durante o ano</h2>
                <!-- <div class="botoesGraficos">
                <button class="lucroButton graficoAtual" onclick="ativar(this)">Ganhos</button>
                <button class="gastoButton" onclick="ativar(this)">Gastos</button>
            </div> -->

                <div class="grafico graficoLucro">
                    <ul class="numeros numerosLucro">
                        <li><span></span></li>
                        <li><span></span></li>
                        <li><span></span></li>
                    </ul>
                    <ul class="barras barrasLucro">

                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Jan</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Fev</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Mar</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Abr</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Mai</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Jun</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Jul</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Ago</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Set</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Out</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Nov</span>
                        </li>
                        <li>
                            <div class="barra barraLucro"> <span class="tooltipLucro"></span></div> <span class="mes">Dez</span>
                        </li>
                    </ul>
                </div>



                <!-- <div class="grafico graficoGasto graficoDesativado">
                <ul class="numeros numerosGasto">
                    <li><span></span></li>
                    <li><span></span></li>
                    <li><span></span></li>
                </ul>
                <ul class="barras barrasGasto">
                    
                    <li><div class="barra barraGasto"></div> <span>Jan</span></li>
                    <li><div class="barra barraGasto"></div> <span>Fev</span></li>
                    <li><div class="barra barraGasto"></div> <span>Mar</span></li>
                    <li><div class="barra barraGasto"></div> <span>Abr</span></li>
                    <li><div class="barra barraGasto"></div> <span>Mai</span></li>
                    <li><div class="barra barraGasto"></div> <span>Jun</span></li>
                    <li><div class="barra barraGasto"></div> <span>Jul</span></li>
                    <li><div class="barra barraGasto"></div> <span>Ago</span></li>
                    <li><div class="barra barraGasto"></div> <span>Set</span></li>
                    <li><div class="barra barraGasto"></div> <span>Out</span></li>
                    <li><div class="barra barraGasto"></div> <span>Nov</span></li>
                    <li><div class="barra barraGasto"></div> <span>Dez</span></li>
                </ul>
            </div> -->


            </div>

        </div>
        <div class="voce desativado">
            <div class="infoRelatorio">
                <div class="infoRelatorioGrid infoRelatorioVoce">
                    <div>
                        <h3>Total contribuido</h3>
                        <p>R$ 640,00</p>
                    </div>
                    <div>
                        <h3>Últimos 6 meses</h3>
                        <p>R$ 302,00</p>
                    </div>
                    <div>
                        <h3>Esse mês</h3>
                        <p>R$ 20,50</p>
                    </div>
                </div>
            </div>
            <div class="listaExtratosVoce">
                <!-- <h2>Suas vendas -<span> 2 clientes</span></h2> -->
                <h2>Seu extrato</h2>

                <div class="legendaListaVoce">
                    <p>Nome</p>
                    <p>Valor</p>
                    <p>Tipo</p>
                    <p>Data</p>

                </div>
                <div class="listasVoce">
                    <div class="extratoVoce">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>

                    </div>
                    <div class="extratoVoce">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>12/04/50BCE</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>29/04/2005</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>12/04/50BCE</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>29/04/2005</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>12/04/50BCE</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>29/04/2005</p>
                        <p>R$ 118,00</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>12/04/2005</p>
                        <p>R$ 244,38</p>
                        <a>VER MAIS</a>
                        <p>00/00/0000</p>
                    </div>
                    <div class="extratoVoce">
                        <p>Admin</p>
                        <p>R$ -20,00</p>
                        <p>Saldo</p>
                        <p>00/00/0000</p>
                    </div>
                </div>
                <div class="paginationVoce">
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

                <button class="imprimir">Imprimir relatório completo</button>


            </div>
            <div class="graficosVoce">
                <h2>Seus lucros durante o ano</h2>
                <!-- <div class="botoesGraficos">
                <button class="lucroButton graficoAtual" onclick="ativar(this)">Ganhos</button>
                <button class="gastoButton" onclick="ativar(this)">Gastos</button>
            </div> -->

                <div class="graficoVoce graficoLucroVoce">
                    <ul class="numerosVoce numerosLucroVoce">
                        <li><span></span></li>
                        <li><span></span></li>
                        <li><span></span></li>
                    </ul>
                    <ul class="barrasVoce barrasLucroVoce">

                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Jan</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Fev</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Mar</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Abr</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Mai</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Jun</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Jul</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Ago</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Set</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Out</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Nov</span>
                        </li>
                        <li>
                            <div class="barraVoce barraLucroVoce"> <span class="tooltipLucroVoce"></span></div> <span class="mesVoce">Dez</span>
                        </li>
                    </ul>
                </div>



                <!-- <div class="grafico graficoGasto graficoDesativado">
                <ul class="numeros numerosGasto">
                    <li><span></span></li>
                    <li><span></span></li>
                    <li><span></span></li>
                </ul>
                <ul class="barras barrasGasto">
                    
                    <li><div class="barra barraGasto"></div> <span>Jan</span></li>
                    <li><div class="barra barraGasto"></div> <span>Fev</span></li>
                    <li><div class="barra barraGasto"></div> <span>Mar</span></li>
                    <li><div class="barra barraGasto"></div> <span>Abr</span></li>
                    <li><div class="barra barraGasto"></div> <span>Mai</span></li>
                    <li><div class="barra barraGasto"></div> <span>Jun</span></li>
                    <li><div class="barra barraGasto"></div> <span>Jul</span></li>
                    <li><div class="barra barraGasto"></div> <span>Ago</span></li>
                    <li><div class="barra barraGasto"></div> <span>Set</span></li>
                    <li><div class="barra barraGasto"></div> <span>Out</span></li>
                    <li><div class="barra barraGasto"></div> <span>Nov</span></li>
                    <li><div class="barra barraGasto"></div> <span>Dez</span></li>
                </ul>
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

       


       
    </script>
    <script type="text/javascript" src="../items/js/relatorio/grafico.js"></script>
    <script type="text/javascript" src="../items/js/relatorio/salaVoce.js"></script>
    <script type="text/javascript" src="../items/js/relatorio/extrato.js"></script>

</body>

</html>