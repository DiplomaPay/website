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


<!--Login-->
	
	<hr>
	<h1>SignUp área </h1>
	<form action="javascript:void(0)" onsubmit="sendSignup()">
	    <input id='email_signup' type="text" placeholder="Email"/>
	    <input id='password_signup' type="password" placeholder="Password"/>
	    <input id='confirm_password_signup' type="password" placeholder="Password"/>
	    <input id='cpf_signup' type="number" placeholder="CPF"/>
	    <input id='name_signup' type="text" placeholder="Full name"/>
	    <button>Enviar</button>
	</form>
	<p id='res_signup'></p>
	<hr>
	
    <!--Login	-->
	<script>
        const email_signup = document.getElementById("email_signup");
        const password_signup = document.getElementById("password_signup");
        const confirm_password_signup = document.getElementById("confirm_password_signup");
        const cpf_signup = document.getElementById("cpf_signup");
        const name_signup = document.getElementById("name_signup");
        
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
	        
	        fetch("./sys/user/account/signup", {
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