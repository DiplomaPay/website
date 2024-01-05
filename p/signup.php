

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../items/css/styles.css">
  <title>Cadastro</title>
</head>
<body>
  <div class="container">
    <form id="signupForm">
      <label for="full_name">Nome Completo:</label>
      <input type="text" id="full_name" required>
      
      <label for="cpf">CPF:</label>
      <input type="text" id="cpf" pattern="\d{11}" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" required>
      
      <label for="password">Senha:</label>
      <input type="password" id="password" required>
      
      <label for="confirm_password">Confirmar Senha:</label>
      <input type="password" id="confirm_password" required>
      
      <button type="button" onclick="signup()">Cadastrar</button>
    </form>
  </div>
  
  <script src="../items/js/signup.js"></script>
</body>
</html>