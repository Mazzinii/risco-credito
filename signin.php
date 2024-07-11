<?php
   //verificando se o submit existe (só é acionado quando clicado em enviar)    
  if( isset($_POST['submit']) || isseT($_POST['senha']) || isseT($_POST['confirmsenha'])) {
    //verificando se o campo de senha e confirmar senha sao iguais
     if(($_POST['senha']) != ($_POST['confirmsenha'])) {

      echo "As senhas não são iguais, tente novamente";
    
    } else {
      //incluindo as config da aba conexao.php
      include_once('conexao.php');

      // definindo variaveis com os campos input pelo id
      $nome = $_POST['nome'];
      $nasc = $_POST['nasc'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];

      //adicioando as variveis em seus respectivos lugares no banco de dados
      $result = mysqli_query($mysqli, "INSERT INTO login(nome,data_nasc,email,senha) VALUES ('$nome','$nasc','$email','$senha')");

      header('Location:login.php');
    }

  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="script.js" defer></script>
    <title>Risco-Credito</title>
  </head>
  <body>
    <header class="header">
      <nav class="nav">
        <p>LOGO</p>
      </nav>
    </header>
    <section class="mainpage2 signIn">
      <div class="left lsignin">
        <h1>
          Preencha todos os campos ao lado com os dados pedidos para efetuar o
          cadastro.
        </h1>
      </div>
      <div class="right rsignin">
        <form action="signin.php" method="POST" onsubmit="verfSenha(event)">
          <div class="inputbox">
            <input type="text" name="nome" id="nome" class="inputUser" required />
            <label for="nome" class="labelinput">Nome</label>
          </div>
          <div class="inputbox">
            <input type="email" name="email" id="email" class="inputUser" required />
            <label for="email" class="labelinput">E-mail</label>
          </div>
          <div class="inputbox">
              <label for="nasc" >Data de Nascimento</label>
              <br>
             <input type="date" name="nasc" id="nasc" required />
          </div>
          <div class="inputbox">
            <input type="password" name="senha" class="inputUser" id="senha" required />
            <label for="senha" class="labelinput">Senha</label>
          </div>
          <div class="inputbox">
            <input type="password" name="confirmsenha" class="inputUser" id="confirmsenha" required />
            <label for="confirmsenha" class="labelinput">Confirmar Senha</label>
          </div>
          <div class="textlogin">
            <p>ou se ja possuir uma conta <a href="login.php">Login</a></p>
            <p class="errorSenha"></p>
            <p class="cadastroOk"></p>
          </div>
          <div class="buttonForm"><input type="submit" name="submit" class="buttonSubmit"></input></div>
        </form>
      </div>
    </section>
  </body>
</html>
