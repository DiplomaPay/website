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
                Logar
          </div>
          <div class="field">
            <div class="label">Email</div>
            <input type="text" name="email" id="email" placeholder="fulano@gmail.com">
          </div>

          <div class="field">
            <div class="label">Senha</div>
            <input type="password" name="password" id="password" placeholder="*********">
          </div>

          <div class="field">
            <button class="next nextBtn" >Entrar</button>
          </div>
          <a class="prev" href="../index.php">Recuperar Senha</a>
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
        const res_login = document.getElementById("res_login");
        
	    const sendLogin = () => {
	        let email = email_login.value;
	        let password = password_login.value;
	        
	        let data = {
	            email: email,
	            password: password
	        }
	        
	        fetch("https://dpay.trive.fun/sys/user/account/login.php", {
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_login.innerText = JSON.stringify(e);
	        })
	    }
	</script>
  
</body>
</html>

