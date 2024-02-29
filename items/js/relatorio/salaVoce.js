const salaButton = document.querySelector('.salaButton');
const voceButton = document.querySelector('.voceButton');
const botoes = document.querySelectorAll('.botoes button')

const infoSala = document.querySelector('.sala');
const infoVoce = document.querySelector('.voce');

console.log(botoes);

function ativar(element) {

    botoes.forEach(e => {
        e.classList.remove('relatorioAtual')
    
    });
    element.classList.add('relatorioAtual')


    if (element === salaButton) {
        infoSala.classList.remove('desativado');
        infoVoce.classList.add('desativado')
    } else if (element === voceButton) {
        infoVoce.classList.remove('desativado');
        infoSala.classList.add('desativado');
    }
}