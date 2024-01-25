
function clean(input) {
  var currentValue = input.value; 
  var sanitizedValue = currentValue.replace(/\D/g, '');

  if (sanitizedValue.length >= 3) {
    if (sanitizedValue.length < 6) {
      input.value = sanitizedValue.substring(0, 3) + '.' + sanitizedValue.substring(3);
    } else if (sanitizedValue.length < 9) {
      input.value = sanitizedValue.substring(0, 3) + '.' + sanitizedValue.substring(3, 6) + '.' + sanitizedValue.substring(6);
    } else {
      input.value = sanitizedValue.substring(0, 3) + '.' + sanitizedValue.substring(3, 6) + '.' + sanitizedValue.substring(6, 9) + '-' + sanitizedValue.substring(9);
    }
  } else {
    input.value = sanitizedValue;
  }
}

const email_signup = document.getElementById("email");
const password_signup = document.getElementById("password");
const confirm_password_signup = document.getElementById("confPassword");
const cpf_signup = document.getElementById("cpf");
const name_signup = document.getElementById("nome");

const sendSignup = () => {
  let email = email_signup.value;
  let password = password_signup.value;
  let confirm_password = confirm_password_signup.value;
  let cpf = cpf_signup.value;
  let name = name_signup.value;
      
      let data = {
          email: email,
          password: password,
          confirm_password: confirm_password,
          cpf: cpf,
          name: name
      }
      
      fetch("https://dpay.trive.fun/sys/user/account/signup.php", {
          method: "POST",
          body: JSON.stringify(data),
      })
      .then(e=>e.json())
      .then(e=>{
        console.log(e);
      })
  }

  const sendCode =() => {
    var input1 = document.getElementById("input1").value;
    var input2 = document.getElementById("input2").value;
    var input3 = document.getElementById("input3").value;
    var input4 = document.getElementById("input4").value;
    var input5 = document.getElementById("input5").value;
    var input6 = document.getElementById("input6").value;

    var codeJunto = input1 + input2 + input3 + input4 + input5 + input6;

    let code = {
      code: codeJunto
    }

    fetch("https://dpay.trive.fun/sys/user/account/activate.php", {
      method: "POST",
      body: JSON.stringify(code),
    })
    .then(e=>e.json())
    .then(e=>{
      console.log(e);
    })
  }


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
  const emailInput = document.querySelector("#email");
  let emailValue = emailInput.value;

  if (cpfInput.value.length !== 14) {
    cpfInput.style.border = "2px solid red";
    setTimeout(() => {
      cpfInput.style.border = "";
    }, 2000);
    return;
  }
  if (!isValidEmail(emailValue)) {
    emailInput.style.border = "2px solid red";
    setTimeout(() => {
      emailInput.style.border = "";
    }, 2000);
    return;
  }

  

  slidePage.style.marginLeft = "-100%";
  three.style.backgroundColor = "var(--verdeClaro)";
  three.style.color = "var(--branco)";
  three.style.border = "3px solid var(--branco)";
});

function isValidEmail(email) {
  // Use a regular expression for basic email validation
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

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
  slidePage.style.marginLeft = "-129%";
  progress.style.display = "none";
  container.style.height = "35vh";
  container.style.width = "20vw"
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




 
});




