<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <script src="scriptlogin.js" defer></script>
    <title>Risco-Credito</title>
  </head>
  <body>
    <header class="header">
      <nav class="nav">
        <p>LOGO</p>
      </nav>
    </header>
    <section class="mainpage2 signIn">
      <div class="right rsignin">
        <h1>
          Preencha todos os campos com os dados que já foram cadastrados.
        </h1>
      </div>
      <div class="left lsignin">
        <form action="testlogin.php" method="POST" onsubmit="loginAdm(event)">
          
          <div class="inputbox">
            <input type="email" name="email" id="email" class="inputUser" required />
            <label for="email" class="labelinput">E-mail</label>
          </div>
          <div class="inputbox">
            <input type="password" name="senha" class="inputUser" id="senha" required />
            <label for="senha" class="labelinput">Senha</label>
          </div>
          <div class="textlogin">
            <p class="errorSenha"></p>
            <p class="cadastroOk"></p>
          </div>
          <div class="buttonForm"><input type="submit" name="submit"  class="buttonSubmit"></input></div>
        </form>
      </div>
    </section>
  </body>
</html>
