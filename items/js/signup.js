document.addEventListener("DOMContentLoaded", function () {

const slidePage = document.querySelector(".slidePage");
const firstNextBtn = document.querySelector(".nextBtn");
const container = document.querySelector(".container");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submit = document.querySelector(".submit");
const progress = document.querySelector(".progress-bar");
const two = document.querySelector(".two");
const three = document.querySelector(".three");

firstNextBtn.addEventListener("click", function() {
  const nomeInput = document.querySelector("input[name='nome']");
  if (nomeInput.value === "") {
    nomeInput.style.border = "2px solid red";
    setTimeout(() => {
      nomeInput.style.border = "";
    }, 2000);
    return;
  }
  slidePage.style.marginLeft = "-50%";
  container.style.height = "40vh";
  two.style.backgroundColor = "var(--verdeClaro)";
  two.style.color = "var(--branco)";
  two.style.border = "3px solid var(--branco)";
});

nextBtnSec.addEventListener("click", function() {
  let cpfInput = document.querySelector("#cpf");
  const emailInput = document.querySelectorAll("input[type='text']")[1];
  if (cpfInput.value === "" || emailInput.value === "") {
    if (cpfInput.value === "") {
      cpfInput.style.border = "2px solid red";
      setTimeout(() => {
        cpfInput.style.border = "";
      }, 2000);
    }
    if (emailInput.value === "") {
      emailInput.style.border = "2px solid red";
      setTimeout(() => {
        emailInput.style.border = "";
      }, 2000);
    }
    return;
  }
  slidePage.style.marginLeft = "-100%";
  three.style.backgroundColor = "var(--verdeClaro)";
  three.style.color = "var(--branco)";
  three.style.border = "3px solid var(--branco)";
});

nextBtnThird.addEventListener("click", function() {
  const senhaInput = document.querySelector("input[type='password']");
  const confirmarSenhaInput = document.querySelectorAll("input[type='password']")[1];
  if (senhaInput.value === "" || confirmarSenhaInput.value === "") {
    if (senhaInput.value === "") {
      senhaInput.style.border = "2px solid red";
      setTimeout(() => {
        senhaInput.style.border = "";
      }, 2000);
    }
    if (confirmarSenhaInput.value === "") {
      confirmarSenhaInput.style.border = "2px solid red";
      setTimeout(() => {
        confirmarSenhaInput.style.border = "";
      }, 2000);
    }
    return;
  }
  slidePage.style.marginLeft = "-150%";
  progress.style.display = "none";
  container.style.height = "35vh";
});

prevBtnSec.addEventListener("click", function() {
  slidePage.style.marginLeft = "0%";
  container.style.height = "30vh";
  two.style.backgroundColor = "var(--branco)";
  two.style.color = "var(--verde)";
  two.style.border = "3px solid var(--verdeClaro)";
});

prevBtnThird.addEventListener("click", function() {
  slidePage.style.marginLeft = "-50%";
  three.style.backgroundColor = "var(--branco)";
  three.style.color = "var(--verde)";
  three.style.border = "3px solid var(--verdeClaro)";
});

prevBtnFourth.addEventListener("click", function() {
  slidePage.style.marginLeft = "-100%";
  progress.style.display = "flex";
  container.style.height = "40vh";
});




  // Seleciona todos os campos de código
  const codigoInputs = document.querySelectorAll('.codigo input');

  // Adiciona um ouvinte de evento de entrada para cada campo de código
  codigoInputs.forEach(function (input) {
    input.addEventListener('input', function () {
      // Limita o valor do campo a apenas um número
      this.value = this.value.replace(/[^0-9]/g, '');

      // Move o foco para o próximo campo após inserir um número
      if (this.value.length === 1) {
        const nextInput = this.nextElementSibling;
        if (nextInput) {
          nextInput.focus();
        }
      }
    });
  });

  const cpfInput = document.querySelector("#cpf");
  cpfInput.addEventListener('keypress', () => {
    let inputLenght = cpfInput.value.length

    console.log(inputLenght);

    if (inputLenght == 3 || inputLenght == 7){
      cpfInput.value += '.'
    }else if (inputLenght == 11){
      cpfInput.value += '-'
    }
  })

});

