        const dadosLucro = [120, 300, 200, 45, 100, 500, 300, 25, 100, 90, 400, 250];
        const maiorDadoLucro = Math.max(...dadosLucro)
        const span0Lucro = document.querySelector(".numerosLucro li:nth-child(1)");
        const span1Lucro = document.querySelector(".numerosLucro li:nth-child(2)");
        const span2Lucro = document.querySelector(".numerosLucro li:nth-child(3)");

        span0Lucro.innerText = maiorDadoLucro
        span1Lucro.innerText = maiorDadoLucro/2
        span2Lucro.innerText = 0;

        const dadosFinaisLucro = [];
        const conversaoLucro = []
        

        dadosLucro.forEach((e) => {
            dadosFinaisLucro.push(e / maiorDadoLucro);

        })

        dadosFinaisLucro.forEach((e) =>{

            conversaoLucro.push((e/1)*100)
        })

        const barrasLucro = document.querySelectorAll(".barraLucro")
        barrasLucro.forEach((e, i) => {
                e.style.height = conversaoLucro[i] + '%'

        });

        const tooltip = document.querySelectorAll('.tooltipLucro')
        tooltip.forEach((e, i) => {
            
            
            e.textContent = `R$${dadosLucro[i]}`
        })




        // const dadosGasto = [120, 300, 200, 45, 100, 500, 300, 25, 100, 90, 400, 250];
        // const maiorDadoGasto = Math.max(...dadosGasto)
        // const span0Gasto = document.querySelector(".numerosGasto li:nth-child(1)");
        // const span1Gasto = document.querySelector(".numerosGasto li:nth-child(2)");
        // const span2Gasto = document.querySelector(".numerosGasto li:nth-child(3)");

        // span0Gasto.innerText = maiorDadoGasto
        // span1Gasto.innerText = maiorDadoGasto/2
        // span2Gasto.innerText = 0;

        // const dadosFinaisGasto = [];
        // const conversaoGasto = []

        // dadosGasto.forEach((e) => {
        //     dadosFinaisGasto.push(e / maiorDadoGasto);
        //     console.log(dadosFinaisGasto);

        // })

        // dadosFinaisGasto.forEach((e) =>{

        //     conversaoGasto.push((e/1)*100)
        // })

        // const barrasGasto = document.querySelectorAll(".barraGasto")
        // barrasGasto.forEach((e, i) => {
        //         e.style.height = conversaoGasto[i] + '%'

        // });



        const lucroButton = document.querySelector('.lucroButton');
        const gastoButton = document.querySelector('.gastoButton');
        const botoesGrafico = document.querySelectorAll('.graficos button')

        const graficoLucro = document.querySelector('.graficoLucro');
        const graficoGasto = document.querySelector('.graficoGasto');

      

        function ativar(element){
            botoesGrafico.forEach(element => {
                element.classList.remove('graficoAtual')
            });

            element.classList.toggle('graficoAtual')
          
            if(element === lucroButton){
                graficoLucro.classList.remove('graficoDesativado');
                graficoGasto.classList.add('graficoDesativado')
            } else if (element === gastoButton){
                graficoGasto.classList.remove('graficoDesativado');
                graficoLucro.classList.add('graficoDesativado');
            }
        }