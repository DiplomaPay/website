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


<!--SIGNUP-->
	
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
	
    <!--SIGNUP	-->
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
	        
	        fetch("https://dpay.trive.fun/sys/user/account/signup.php", { 
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_signup.innerText = JSON.stringify(e);
	        })
	    }
	</script> 


<!--Activate-->
	
<hr>
	<h1>Activate account </h1>
	<form action="javascript:void(0)" onsubmit="sendActivate()">
	    <input id='code_activate' type="text" placeholder="Code"/>
	    <button>Enviar</button>
	</form>
	<p id='res_activate'></p>
	<hr>
	
    <!--Activate	-->
	<script>
        const code_activate = document.getElementById("code_activate");

        
	    const sendActivate = () => {
	        let code = code_activate.value;

	        let data = {
	            code: code,
	        }
	        
	        fetch("https://dpay.trive.fun/sys/user/account/activate.php", {
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_activate.innerText = JSON.stringify(e);
	        })
	    }
	</script> 

	<!--Change password-->
	
<hr>
	<h1>Change password </h1>
	<form action="javascript:void(0)" onsubmit="sendChangePassword()">
	    <input id='email_change_password' type="text" placeholder="Email"/>
	    <input id='code_change_password' type="text" placeholder="Code"/>
	    <input id='password_change_password' type="text" placeholder="New password"/>
	    <input id='new_password_change_password' type="text" placeholder="Confirm new password"/>
	    <button>Enviar</button>
	</form>
	<p id='res_change_password'></p>
	<hr>
	
    <!--Change password	-->
	<script>
		
        const email_change_password = document.getElementById("email_change_password");
        const code_change_password = document.getElementById("code_change_password");
        const password_change_password = document.getElementById("password_change_password");
        const new_password_change_password = document.getElementById("new_password_change_password");
        
	    const sendChangePassword = () => {
	        let email = email_change_password.value;
	        let code = code_change_password.value;
	        let password = password_change_password.value;
	        let new_password = new_password_change_password.value;

	        let data = {
				email: email,
	            code: code,
				password: password,
				new_password: new_password
	        }
	        
	        fetch("https://dpay.trive.fun/sys/user/configs/change_password.php", {
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_change_password.innerText = JSON.stringify(e);
	        })
	    }
	</script> 

	
	<hr>

	<h1>Create room </h1>
	<input id='room_name' type="text" placeholder="Room name"/>
	<button onclick="sendCreateRoom()">Create Room</button>
	<p id='res_create_room'></p>
	<hr>
    <!--Create room-->
	 <script>
        const room_name = document.getElementById("room_name");
	    const sendCreateRoom= () => {
			let data = {
				room_name: room_name.value,
				assinatura: "concordo"
			}

	        fetch("https://dpay.trive.fun/sys/room/create.php", {
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_create_room.innerText = JSON.stringify(e);
				myrooms();
	        })
	    }
	</script> 

<h1>join room </h1>
	<input id='join_room_name' type="text" placeholder="Room code"/>
	<button onclick="sendjoinRoom()">join Room</button>
	<p id='res_join_room'></p>
	<hr>
    <!--join room-->
	 <script>
        const join_room_name = document.getElementById("join_room_name");
	    const sendjoinRoom= () => {
			let data = {
				room_code: join_room_name.value,
			}

	        fetch("https://dpay.trive.fun/sys/room/join.php", {
	            method: "POST",
	            body: JSON.stringify(data),
	        })
	        .then(e=>e.json())
	        .then(e=>{
	            res_join_room.innerText = JSON.stringify(e);
				myrooms();
	        })
	    }
	</script> 
	<!--Pix-->
		
	<img style="max-width: 200px; width: calc(100% - 20px)" id="pix_img">
	<p id='res_pix'></p>
	<p id='res_pix_status'></p>
	
    <!--Pix	-->
	<script>

		let blocked = false;
        
		const sendPixPay = (val, room) => {
			let src = "data:image/png;base64,";
			let pix_img = document.getElementById("pix_img");

			if(!blocked){
				blocked = true;
				fetch("https://dpay.trive.fun/sys/payment/pix/pay.php",{
					method: "POST",
					body: JSON.stringify({
						value: val,
						room_code: room
					})
				})
				.then(e => e.json())
				.then(e => {
					res_pix.innerText = JSON.stringify(e);
					res_pix_status.innerText = e.status_pix;
					pix_img.src = `${src}${e.pay_code_img}`;
					if(e.status_pix != "approved"){
						verifyPix(e);
					}
				})
			} else {
				alert("Pague primeiro para gerar outro")
			}
		}

		const verifyPix = (e) => {
			let xx = setInterval(async () => {
				let status = await sendPixVerify(e.id_pix);
				console.log(status);
				if(status === "approved") {
					clearInterval(xx);
					blocked = false;
					myrooms();
				}
			}, 5000);
		}

		const sendPixVerify = async (e) => {
			let status = await fetch(`https://dpay.trive.fun/sys/payment/verify.php?id=${e}`)
			.then(e => e.json())
			.then(e => {
				res_pix_status.innerText = e.status_pix;
				res_pix.innerText = JSON.stringify(e);
				return e.status_pix;
			})
			return status;
		}

	</script> 
	<h1>Minhas salas</h1>
	<p id='myrooms_list'></p>
	<hr>
    <!--join room-->
	 <script>
	    const myrooms = (e) => {

	        fetch("https://dpay.trive.fun/sys/room/list.php")
	        .then(e=>e.json())
	        .then(e=>{
				myrooms_list.innerHTML = "";
				let data = e;
				console.log(data)
	            for(let i = 0; i < data.length; i++){
					myrooms_list.innerHTML += `
						<div>id: ${data[i].id} - Name: ${data[i].room_name} - Code: ${data[i].room_code} - Valor na sala: R$${data[i].ammount_room} - Usuário: ${data[i].typeuser} <button onclick='newPayment("${data[i].room_code}")'>Novo pagamento R$0.01</button></div>
					`;
				}
	        })
	    }

		myrooms();

		const newPayment = (e) => {
			sendPixPay(0.01, e);
		}
	</script> 

	<h1>Limpar todos os dados do BD</h1>
	<button onclick="cleanbd('users')">Limpar usuarios</button>
	<button onclick="cleanbd('room')">Limpar salas</button>
	<button onclick="cleanbd('join_room')">Salas entradas</button>
	<button onclick="cleanbd('payment_pix')">Limpar pagamentos pix</button>
	<p id='cleanbdd'></p>
	<hr>
    <!--join room-->
	 <script>
	    const cleanbd= (e) => {

	        fetch("https://dpay.trive.fun/sys/cleanbd.php?name="+e)
	        .then(e=>e.json())
	        .then(e=>{
	            cleanbdd.innerText = JSON.stringify(e);
	        })
	    }
	</script> 

</body>
</html>