<?php
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  $conexao = mysqli_connect('localhost','u752370168_dpay','Easycodex123','u752370168_dpay') or die ("Atualize a página e tente novamente!");

  $__EMAIL__ = $_SESSION["__EMAIL__"];
  
  if($__EMAIL__){
    error_log("aa");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./items/css/styles.css">
  <link rel="stylesheet" href="./items/css//global.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="./items/img/icon.png" type="image/x-icon">
  <title>Login</title>
  <script src="./items/js/login.js"></script>
</head>
<body>
<img src="./items/img/IconBranco.svg" alt="DiplomaPay Logo">
  <div class="container">
    <div class="form-outer">
      <form action="javascript:void(0)">
        <div class="page slidePage">
          <div class="title">
                LOGAR
          </div>
          <div class="field">
            <div class="label">Email</div>
            <input type="text" id="email_login" placeholder="fulano@gmail.com">
          </div>

          <div class="field">
            <div class="label">Senha</div>
            <input type="password" name="password" id="password_login" placeholder="*********">
          </div>

          <div class="field">
            <button class="next nextBtn" onclick="sendLogin()">Entrar</button>
          </div>
          <a class="prev" href="./p/change_password.php">Recuperar Senha</a>
          <br>
          <a class="prev" href="./p/signup.php">Cadastrar</a>
        </div>
      </form>
    </div>
  </div>


    <!-- /*teste webhook git -> hostinger 6.0*/ -->

    <script>
        const email_login = document.getElementById("email_login");
        const password_login = document.getElementById("password_login");
        
        document.getElementById("email_login").addEventListener("input", function () {
          this.parentNode.removeAttribute("data-error");
        });
        document.getElementById("password_login").addEventListener("input", function () {
          this.parentNode.removeAttribute("data-error");
        });

	    const sendLogin = () => {
	        let email = email_login.value;
	        let password = password_login.value;
	        
	        let data = {
	            email: email,
	            password: password
	        }
	        
	        fetch("https://diplomapay.com/sys/user/account/login.php", {
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
            console.log(e); 
            let mensagem = e.message;

            console.log(mensagem)

            if (mensagem !="Success."){
              if (mensagem === "User not found."){
                document.querySelector("#email_login").parentNode.setAttribute("data-error", "Usuário não encontrado");
                email_login.style.borderColor = "red" 
                setTimeout(() => {
                  email_login.style.borderColor = "var(--verde)" 
                },2000);   
                return;
              }
              else if (mensagem === "Activate your account."){
                document.querySelector("#email_login").parentNode.setAttribute("data-error", "Ative sua conta");
                email_login.style.borderColor = "red" 
                setTimeout(() => {
                  email_login.style.borderColor = "var(--verde)" 
                },2000);   
                return;
              }
              else if (mensagem === "Wrong password."){
                document.querySelector("#password_login").parentNode.setAttribute("data-error", "Senha errada")
                password_login.style.borderColor = "red" 
                setTimeout(() => {
                  password_login.style.borderColor = "var(--verde)" 
                },2000);   
                return;
              }
              return;
             
            }
            window.location.href="./p/room.php"
        })
	    }
	</script>
  
</body>
</html>

