

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../items/css/signup.css">
  <link rel="stylesheet" href="../items/css/global.css">
  <title>Cadastro</title>
</head>
<body>
  <img src="../items/img/IconBranco.svg" alt="DiplomaPay Logo">
  <div class="container">
    <div class="form-outer">
      <form action="#">
        <div class="page slidePage">
          <div class="title">
                Cadastrar
          </div>
          <div class="field">
            <div class="label">Nome Completo</div>
            <input type="text" name="" id="" placeholder="Fulano da Silva">
          </div>

          <div class="field">
            <button class="next nextBtn" >Continuar</button>
          </div>
          <a class="prev" href="../index.php">Logar</a>
        </div>

        <div class="page">
          <div class="title">
                Cadastrar
          </div>
          <div class="field">
            <div class="label">CPF</div>
            <input type="number" name="000.000.000-00" id="">
          </div>
          <div class="field">
            <div class="label">Email</div>
            <input type="text" name="fulano@gmail.com" id="">
          </div>

          <div class="field  btns">
            <button class="next-1 next">Continuar</button>
            <button class="prev-1 prev">Voltar</button>
          </div>
        </div>

        <div class="page">
          <div class="title">
                Cadastrar
          </div>
          <div class="field">
            <div class="label">Senha</div>
            <input type="password" name="*********" id="">
          </div>
          <div class="field">
            <div class="label">Confirmar Senha</div>
            <input type="password" name="*********" id="">
          </div>

          <div class="field  btns">
            <button class="next-2 next">Continuar</button>
            <button class="prev-2 prev">Voltar</button>
          </div>
        </div>

        <div class="page">
          <div class="title">
                Verficiação de E-mail
          </div>
          <div class="field">
            <div class="text">
                <p>Código enviado para seu email</p>
                <p class="email">exemplo@gmail.com</p>
            </div>
            <div class="codigo">
              <div></div>
              <div></div>
              <div></div>
              <div></div>
              <div></div>
            </div>
          </div>

          <div class="field  btns">
            <button class="submit next">Finalizar</button>
            <button class="prev-3 prev">Voltar</button>
          </div>
        </div>


      </form>
    </div>



    <!-- <form id="signupForm">
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
    </form> -->
  </div>
  <div class="progress-bar">
      <div class="step">
        <div class="bullet one">
          1
        </div>
        <div class="check"></div>
      </div>
      <div class="step">
        <div class="bullet two">
          2
        </div>
      </div>
      <div class="step">
        <div class="bullet three">
          3
        </div>
      </div>
    </div>

  
  <script src="../items/js/signup.js"></script>
</body>
</html>