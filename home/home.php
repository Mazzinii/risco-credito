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


    $sql = "SELECT nome  FROM login WHERE email = '$email'";

    $result = $mysqli->query($sql);
    

    if ($result->num_rows > 0) {
        //se houver resultados, obter o nome do primeiro (e único, no caso de ID único) resultado
        //recuperando o nome com o método fetch_assoc()
        $usuario = $result->fetch_assoc();
        $nome = $usuario["nome"];
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
        <?php echo "<h1>Bem vindo $nome, preencha os dados obrigatórios para efetuar a análise de crédito  </h1>"
       ?>
        </div>
        <div class="right">
          <form action="Analise.php" method="POST">
            
            <div class="inputbox">
                <label for="residencia"><h1>Tipo de residência</h1></label>
                <select name="residencia" id="residencia" class="inputhome" required>
                    <option value="Propria">Própria</option>
                    <option value="Hipoteca">Hipoteca</option>
                    <option value="Alugada">Alugada</option>
                    <option value="Outro">Outro tipo de posse</option>
                </select>
            </div>
            <div class="inputbox">
                <label for="anosTrabalhados" ><h1>Anos Trabalhados</h1></label>
                <select name="anosTrabalhados" id="anosTrabalhados" class="inputhome" required>
                    <option value="0-10">0-10 Anos</option>
                    <option value="10-20">10-20 Anos</option>
                    <option value="30-40">30-40 Anos</option>
                </select>             
            </div>
            <div class="inputbox">
                <label for="rendaAnual"><h1>Renda Anual</h1>
                 <input type="number" name="rendaAnual" id="rendaAnual" required>   
            </div>
            <div class="inputbox">
                <label for="emprestimo"><h1>Valor do Empréstimo</h1>
                 <input type="number" name="emprestimo" id="emprestimo" required>   
            </div>
            <div class="saldo">
                <h1>Saldo: R$ 0,00</h1>
            </div>
            <div class="buttonForm"><input type="submit" name="submit"  class="buttonSubmit" value="Fazer Análise"></input></div>
          </form>
        </div>
      </section>
    </div>
</body>
</html>