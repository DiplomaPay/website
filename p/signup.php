<?php
include"../sys/conexao.php";
// cantLog($__EMAIL__);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../items/css/signup.css">
  <link rel="stylesheet" href="../items/css/global.css">
  <link rel="stylesheet" href="../items/css/mediaSignUp.css">
  <title>Cadastro</title>
</head>

<body>
  <img src="../items/img/IconBranco.svg" alt="DiplomaPay Logo" class="logo">
  <div class="container">
    <div class="form-outer">
      <form action="javascript:void(0)">
        <div class="page slidePage" data-visibilidade="actual">
          <div class="title">
            CADASTRAR
          </div>
          <div class="field">
            <div class="label">Nome Completo</div>
            <input type="text" name="nome" id="nome" placeholder="Fulano da Silva">
          </div>

          <div class="field">
            <button class="next nextBtn">Continuar</button>
          </div>
          <a class="prev" href="../index.php">Logar</a>
        </div>

        <div class="page" data-visibilidade="hidden">
          <div class="title">
            CADASTRAR
          </div>
          <div class="field">
            <div class="label">CPF</div>
            <input type="text" placeholder="000.000.000-00" id="cpf" inputmode="numeric" maxlength="14" oninput="clean(this)">
          </div>
          <div class="field">
            <div class="label">Email</div>
            <input type="text" placeholder="fulano@gmail.com" id="email">
          </div>

          <div class="field  btns">
            <button class="next-1 next">Continuar</button>
            <button class="prev-1 prev">Voltar</button>
          </div>
        </div>

        <div class="page" data-visibilidade="hidden">
          <div class="title">
            CADASTRAR
          </div>
          <div class="field">
            <div class="label">Senha</div>
            <input type="password" placeholder="*********" id="password">
          </div>
          <div class="field">
            <div class="label">Confirmar Senha</div>
            <input type="password" placeholder="*********" id="confPassword">
          </div>

          <div class="field  btns">
            <button class="next-2 next" onclick="sendSignup()">Continuar</button>
            <button class="prev-2 prev">Voltar</button>
          </div>
        </div>

        <div class="page" data-visibilidade="hidden">
          <div class="title">
            VERFICIAÇÃO DE EMAIL
          </div>
          <div class="field">
            <div class="text">
              <p>Código enviado para seu email</p>
              <p class="email"></p>
            </div>
            <div class="codigo">
              <input type="text" maxlength="1" id="input1" class="inputCode">
              <input type="text" maxlength="1" id="input2" class="inputCode">
              <input type="text" maxlength="1" id="input3" class="inputCode">
              <input type="text" maxlength="1" id="input4" class="inputCode">
              <input type="text" maxlength="1" id="input5" class="inputCode">
              <input type="text" maxlength="1" id="input6" class="inputCode">
            </div>
          </div>

          <div class="field  btns">
            <button class="submit next" onclick="sendCode()">Finalizar</button>
            <a class="Resend" onclick="ReSendEmail()">Reenviar E-mail</a>
          </div>
        </div>


      </form>
    </div>


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