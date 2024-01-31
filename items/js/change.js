
  const email_signup = document.getElementById("email");
  const password_signup = document.getElementById("password");
  const confirm_password_signup = document.getElementById("confPassword");
  const slidePage = document.querySelector(".slidePage");
  const container = document.querySelector(".container");
  const firstNextBtn = document.querySelector(".nextBtn");
  const prevBtnSec = document.querySelector(".prev-1");
  const nextBtnSec = document.querySelector(".next-1");
  const nextBtnThird = document.querySelector(".next-2");
  const progress = document.querySelector(".progress-bar");
  const two = document.querySelector(".two");
  const three = document.querySelector(".three");
  const pages = document.querySelectorAll(".page");

  document.getElementById("email").addEventListener("input", function () {
    this.parentNode.removeAttribute("data-error");
  });
  document.getElementById("confPassword").addEventListener("input", function () {
    this.parentNode.removeAttribute("data-error");
  });
  
  
  const sendMail = () => {
    let email = email_signup.value;
        let mail = {
            email: email,
        }
  
        document.querySelector(".email").textContent = email;
  
        console.log("Email:", mail);
        
        fetch("https://diplomapay.com/sys/user/configs/change_password.php", {
            method: "POST",
            body: JSON.stringify(mail),
        })
        .then(e=>e.json())
        .then(e=>{
          console.log(e);
          let mensagem = e.message;
  
          console.log(mensagem)
    
          if (mensagem !="Código de recuperação enviado.") {
        
           if (mensagem === "Email não encontrado."){
            document.querySelector("#email").parentNode.setAttribute("data-error", "Email não encontrado");           
          }
          return;
        } 
        pages[0].style.height = "0px";
        pages[1].style.height = "auto";
        container.style.width = "20vw"
        slidePage.style.marginLeft = "-41.5%";
        two.style.backgroundColor = "var(--verdeClaro)";
        two.style.color = "var(--branco)";
        two.style.border = "3px solid var(--branco)";
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
      var mail = email_signup.value;
      var codeJunto = input1 + input2 + input3 + input4 + input5 + input6;
  
      let code = {
        code: codeJunto,
        mail: mail
      }
  
      fetch("https://diplomapay.com/sys/user/configs/change_password.php", {
        method: "POST",
        body: JSON.stringify(code),
      })
      .then(e=>e.json())
      .then(e=>{
        console.log(e);
        let mensagem = e.message;
        console.log(mensagem)

        console.log(code);
        if (mensagem != 'Código válido.'){
          if (mensagem === 'Código inválido.'){
            console.log("aaa");
            document.querySelector("#input1").parentNode.setAttribute("data-error", "Código invalido");
            document.querySelector(".inputCode").parentNode.setAttribute("data-error", "");
          }
          return;
        }
        pages[1].style.height = "0px";
        pages[2].style.height = "auto";
        slidePage.style.marginLeft = "-100%";
        three.style.backgroundColor = "var(--verdeClaro)";
        three.style.color = "var(--branco)";
        three.style.border = "3px solid var(--branco)";
      })
      
    }
  
    const ReSendEmail = () => {
      let email = email_signup.value;
          
          let data = {
              email: email,
          }
    
          document.querySelector(".email").textContent = email;
    
          console.log("Email:", data);
          
          fetch("https://diplomapay.com/sys/user/configs/change_password.php", {
              method: "POST",
              body: JSON.stringify(data),
          })
          .then(e=>e.json())
          .then(e=>{
            console.log(e);
          })
      }
  
      
  
  document.addEventListener("DOMContentLoaded", function () {
  
  pages.forEach(function (page) {
    pages[0].style.height = "auto";
    page.style.height = "0px";
  });
  
  
  nextBtnSec.addEventListener("click", function() {
    const emailInput = document.querySelector("#email");
    let emailValue = emailInput.value;
  
    // if (!isValidEmail(emailValue)) {
    //   emailInput.style.border = "2px solid red";
    //   setTimeout(() => {
    //     emailInput.style.border = "";
    //   }, 2000);
    //   return;
    // }
  
    // pages[1].style.height = "0px";
    // pages[2].style.height = "auto";
    // slidePage.style.marginLeft = "-100%";
    // three.style.backgroundColor = "var(--verdeClaro)";
    // three.style.color = "var(--branco)";
    // three.style.border = "3px solid var(--branco)";
  });
  
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
  
  nextBtnThird.addEventListener("click", function() {
    // const senhaInput = document.querySelector("input[type='password']");
    // const confirmarSenhaInput = document.querySelectorAll("input[type='password']")[1];
    // if (senhaInput.value === "" || confirmarSenhaInput.value === "" || senhaInput.value != confirmarSenhaInput.value) {
    //   if (senhaInput.value === "") {
    //     senhaInput.style.border = "2px solid red";
    //     setTimeout(() => {
    //       senhaInput.style.border = "";
    //     }, 2000);
    //   }
    //   if (confirmarSenhaInput.value === "") {
    //     confirmarSenhaInput.style.border = "2px solid red";
    //     setTimeout(() => {
    //       confirmarSenhaInput.style.border = "";
    //     }, 2000);
    //   }
    //   return;
    // }
    console.log("aaaa");
  
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
  
  
   
  });
  
  
  
  
  