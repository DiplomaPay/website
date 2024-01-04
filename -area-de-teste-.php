<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Área de teste</title>
</head>
<body>
	
	<!--Login-->
	
	<hr>
	<h1>Login área </h1>
	<form action="javascript:void(0)" onsubmit="sendLogin()">
	    <input id='email_login' type="text" placeholder="Email"/>
	    <input id='password_login' type="password" placeholder="Password"/>
	    <button>Enviar</button>
	</form>
	<p id='res_login'></p>
	<hr>
	
    <!--Login	-->
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
	        
	        fetch("./sys/user/account/login", {
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