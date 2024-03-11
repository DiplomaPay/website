
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
const pages = document.querySelectorAll(".page");

document.getElementById("cpf").addEventListener("input", function () {
  this.parentNode.removeAttribute("data-error");
});
document.getElementById("email").addEventListener("input", function () {
  this.parentNode.removeAttribute("data-error");
});
document.getElementById("confPassword").addEventListener("input", function () {
  this.parentNode.removeAttribute("data-error");
});


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

      document.querySelector(".email").textContent = email;

      console.log("Dados de inscrição:", data);
      
      fetch("https://diplomapay.com/sys/user/account/signup.php", {
          method: "POST",
          body: JSON.stringify(data),
      })
      .then(e=>e.json())
      .then(e=>{
        console.log(e);
        let mensagem = e.message;

        console.log(mensagem)
  
        if (mensagem !="Sucess.") {
        if (mensagem === "CPF already in use."){
          document.querySelector("#cpf").parentNode.setAttribute("data-error", "Esse CPF Já esta em uso");          
          pages[0].dataset.visibilidade="hidden"
          pages[2].dataset.visibilidade="hidden"
          pages[3].dataset.visibilidade="hidden"
          pages[1].dataset.visibilidade="actual"
          two.style.backgroundColor = "var(--verdeClaro)";
          two.style.color = "var(--branco)";
          two.style.border = "3px solid var(--branco)";
        
        } else
         if (mensagem === "Check password and try again."){
          document.querySelector("#confPassword").parentNode.setAttribute("data-error", "Senhas não estão iguais");          
          pages[0].dataset.visibilidade="hidden"
          pages[1].dataset.visibilidade="hidden"
          pages[3].dataset.visibilidade="hidden"
          pages[2].dataset.visibilidade="actual"
          three.style.backgroundColor = "var(--verdeClaro)";
          three.style.color = "var(--branco)";
          three.style.border = "3px solid var(--branco)";
        } else 
        if (mensagem === "Email already in use."){
          document.querySelector("#email").parentNode.setAttribute("data-error", "Esse Email Já esta em uso");          
          pages[0].dataset.visibilidade="hidden"
          pages[1].dataset.visibilidade="actual"
          pages[2].dataset.visibilidade="hidden"
          pages[3].dataset.visibilidade="hidden"
          two.style.backgroundColor = "var(--verdeClaro)";
          two.style.color = "var(--branco)";
          two.style.border = "3px solid var(--branco)";
        }
        return;
      } 
      pages[0].dataset.visibilidade="hidden"
      pages[1].dataset.visibilidade="hidden"
      pages[2].dataset.visibilidade="hidden"
      pages[3].dataset.visibilidade="actual"
      progress.style.display = "none";
      // if (window.innerWidth < 768) {
      //   container.style.width = "46.5vw";
      //   console.log("a");
      // } else {
      //   container.style.width = "20vw";
      //   console.log("b");
      // }
      })
  }

  var inputCodes = document.getElementsByClassName("inputCode");
  for (var i = 0; i < inputCodes.length; i++) {
    inputCodes[i].addEventListener("input", function () {
          this.closest(".codigo").removeAttribute("data-error");
    });
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

    fetch("https://diplomapay.com/sys/user/account/activate.php", {
      method: "POST",
      body: JSON.stringify(code),
    })
    .then(e=>e.json())
    .then(e=>{
      console.log(e);
      let mensagem = e.message;
      console.log(mensagem)
      if (mensagem != 'Account activated.'){
        if (mensagem === 'Code not found.'){
          console.log("aaa");
          document.querySelector("#input1").parentNode.setAttribute("data-error", "Esse CPF Já esta em uso");
          document.querySelector(".inputCode").parentNode.setAttribute("data-error", "");
        }
      }
        
        window.location.href = "https://diplomapay.com/index.php"
    })
    
  }

  const ReSendEmail = () => { 
    let email = email_signup.value;
        
        let data = {
            email: email,
        }
  
        document.querySelector(".email").textContent = email;
  
        console.log("Email:", data);
        
        fetch("https://diplomapay.com/sys/user/configs/newcode.php", {
            method: "POST",
            body: JSON.stringify(data),
        })
        .then(e=>e.json())
        .then(e=>{
          console.log(e);
        })
    }

    

document.addEventListener("DOMContentLoaded", function () {


firstNextBtn.addEventListener("click", function() {
  const nomeInput = document.querySelector("input[name='nome']");
  if (nomeInput.value === "") {
    nomeInput.style.border = "2px solid red";
    setTimeout(() => {
      nomeInput.style.border = "";
    }, 2000);
    return;
  }
 

  pages[0].dataset.visibilidade="hidden"
  pages[2].dataset.visibilidade="hidden"
  pages[3].dataset.visibilidade="hidden"
  pages[1].dataset.visibilidade="actual"
  console.log("aaa");
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


  pages[1].dataset.visibilidade="hidden"
  pages[0].dataset.visibilidade="hidden"
  pages[3].dataset.visibilidade="hidden"
  pages[2].dataset.visibilidade="actual"
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
  if (senhaInput.value === "" || confirmarSenhaInput.value === "" || senhaInput.value != confirmarSenhaInput.value) {
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

});

prevBtnSec.addEventListener("click", function() {

  
 
  pages[1].dataset.visibilidade="hidden"
  pages[2].dataset.visibilidade="hidden"
  pages[3].dataset.visibilidade="hidden"
  pages[0].dataset.visibilidade="actual"
  two.style.backgroundColor = "var(--branco)";
  two.style.color = "var(--verde)";
  two.style.border = "3px solid var(--verdeClaro)";
});

prevBtnThird.addEventListener("click", function() {
  

  pages[2].dataset.visibilidade="hidden"
  pages[0].dataset.visibilidade="hidden"
  pages[3].dataset.visibilidade="hidden"
  pages[1].dataset.visibilidade="actual"
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

      // Move o foco para o próximo campo após inserir um número
      if (this.value.length === 1) {
        const nextInput = this.nextElementSibling;
        if (nextInput) {
          nextInput.focus();
        }
      }
    });
  });

  // const formOuterContainer = document.querySelector(".container .form-outer");
  // window.addEventListener("resize", function () {
  //   // Largura desejada para o contêiner
  //   const desiredWidth = 768; // Altere conforme necessário

  //   // Verifica se a largura da janela é menor que a largura desejada
  //   if (window.innerWidth < desiredWidth) {
  //     // Ajusta a altura para 0px
  //     formOuterContainer.style.height = "0px";
  //   } else {
  //     // Restaura a altura para o valor desejado (pode ser ajustado conforme necessário)
  //     formOuterContainer.style.height = "40vh";
  //   }
  // });

 
});




