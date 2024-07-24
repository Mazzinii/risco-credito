<?php
    //iniciando sessao
    session_start();


    //verificando se a sessao nao existe
    if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
        //destruindo qualquer sessao
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        //redirecionando para a tela de login
        header('Location: ../login/login.html');
    }

    //pegar nome do usuario que iniciou a sessao
    include_once('../connection/conexao.php');

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];


    $sql = "SELECT nome, idade FROM login WHERE email = '$email'";

    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {

        //se houver resultados, obter o nome do primeiro (e único, no caso de ID único) resultado

        //recuperando o nome com o método fetch_assoc()
        $usuario = $result->fetch_assoc();

        //pegando o nome do usuario da tabela
        $nome = $usuario["nome"];

        //pegando a idade do usuario da tabela
        $idade = $usuario["idade"];


    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/style.css">
    <title>Risco-Credito</title>
</head>
<body>
    <header class="header">
        <nav class="nav">
          <p>LOGO</p>
          <div class="button-exit">
            <a href="/exit/exit.php"><span>Sair</span></a>
        </nav>
      </header>
      <section class="mainpage2 login ">
        <div class="left">
        <?php echo "<h1>Bem vindo $nome, esta é a sua área de Perfil. </h1>"?>
        <div class="homeImg"><img src="/imagens/Home.jpg" alt="guardando dinheiro em um cofre" ></div>
        </div>
        <div class="right">
            <div class="containerInput">
                <h1 class="profile">Meu Perfil</h1>
                <form action="updateName.php" method="POST" >
                    <div class="profileData">
                        <h1>Nome</h1>
                        <input type="text" name="nomeHome" id="nomeHome" placeholder="<?php echo $nome?>">
                    </div>
                    <div class="profileData">
                        <h1>Idade</h1>
                        <?php echo "<p>$idade anos </p>"?>
                    </div>
                    <div class="ProfileData">
                        <h1>Email</h1>
                        <?php echo "<p>$email</p>"?>
                    </div>
                    <div class="profileSaldo">
                        <h1>Saldo: R$ 0,00</h1>
                    </div>
                    <div class="buttons">
                        <a href="Profile.php">
                            <h1>Dados Bancários</h1>
                        </a>
                        <div class="buttonProfile"><input   type="submit" name="submit"  class="buttonSubmitProfile" value="Editar"></input></div>
                    </div>
                </form>
                </div>
            </div>
          </form>
        </div>
      </section>
    </div>
</body>
</html>