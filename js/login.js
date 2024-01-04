function login() {
    // Obtenha os valores dos campos de entrada
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
  
    // Verifique se os campos não estão vazios
    if (email === "" || password === "") {
      alert("Por favor, preencha todos os campos.");
      return;
    }
  
    // Simule a requisição assíncrona (pode ser substituída por uma chamada real usando fetch)
    setTimeout(function() {
      // Simule a resposta do servidor
      var response = {
        login_status: true,
        status: true,
        message: "Login bem-sucedido. Redirecionando para o painel."
      };
  
      // Verifique se o login foi bem-sucedido
      if (response.login_status) {
        alert(response.message);
        // Redirecione para o painel/dashboard
        window.location.href = "/dashboard";
      } else {
        alert(response.message);
      }
    }, 1000); // Simula um atraso de 1 segundo (pode ser removido em uma implementação real)
  }