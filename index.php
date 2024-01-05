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
  <title>Login</title>
  <script src="./items/js/login.js"></script>
</head>
<body>
    <div class="container">
        <article>
            <img src="./items/img/Pitch DiplomaPay.svg" alt="DiplomaPay Logo">
    
            <h3>LOGIN</h3>
    
            <form  action="javascript:void(0)" onsubmit="sendLogin()" id="loginForm">
                <label for="email">Email:</label>
                <input type="email" id="email_login" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password_login" required>
                
                <button type="button">Login</button>
              </form>
              <p id='res_login'></p>
              <hr>
	
    
              <a href="./p/signup.php">Cadastrar</a>
              <!-- https://dpay.trive.fun/sys/user/account/login -->

              <p>Copyright @ 2023</p>
        </article>
        <article class="slides">
            <h1>Frase de efeito passando</h1>
        </article>

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
	        
	        fetch("./sys/user/account/login.php", {
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

