function signup() {
    // Obtenha os valores dos campos de entrada
    var fullName = document.getElementById("full_name").value;
    var cpf = document.getElementById("cpf").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
  
    // Verifique se os campos não estão vazios
    if (fullName === "" || cpf === "" || email === "" || password === "" || confirmPassword === "") {
      alert("Por favor, preencha todos os campos.");
      return;
    }
  
    // Verifique se as senhas coincidem
    if (password !== confirmPassword) {
      alert("As senhas não coincidem.");
      return;
    }
  
    // Simule a requisição assíncrona (pode ser substituída por uma chamada real usando fetch)
    setTimeout(function() {
      // Simule a resposta do servidor
      var response = {
        signup_status: true,
        status: true,
        message: "Cadastro bem-sucedido. Redirecionando para o painel."
      };
  
      // Verifique se o cadastro foi bem-sucedido
      if (response.signup_status) {
        alert(response.message);
        // Redirecione para o painel/dashboard
        window.location.href = "/dashboard";
      } else {
        alert(response.message);
      }
    }, 1000); // Simula um atraso de 1 segundo (pode ser removido em uma implementação real)
  }