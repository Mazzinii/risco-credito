<?php
    //iniciando sessao
    session_start();


    //verificando se a sessao nao existe
    if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
        //destruindo qualquer sessao
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        //redirecionando para a tela de login
        header('Location: login.php');
    }

    //pegar nome do usuario que iniciou a sessao
    include_once('conexao.php');

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];

    $sql = "SELECT nome  FROM login WHERE email = '$email' and  senha = '$senha' ";

    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        //se houver resultados, obter o nome do primeiro (e único, no caso de ID único) resultado
        //recuperando o nome com o método fetch_assoc()
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Risco-Credito</title>
</head>
<body>
    <header class="header">
        <nav class="nav">
          <p>LOGO</p>
          <div class="button-exit">
            <a href="exit.php"><span>Sair</span></a>
        </nav>
      </header>

    <div class="home">
        <h1>login feito com sucesso</h1>
        <?php
       echo "<h1>Bem vindo $nome </h1>"
       ?>
    </div>
</body>
</html>