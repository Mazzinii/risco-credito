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


    $sql = "SELECT nome, residencia, anos_trabalhados, renda_anual, emprestimo FROM login WHERE email = '$email'";

    $result = $mysqli->query($sql);
    
    if ($result->num_rows > 0) {
        //se houver resultados, obter o nome do primeiro (e único, no caso de ID único) resultado
        //recuperando o nome com o método fetch_assoc()
        $usuario = $result->fetch_assoc();
        //pegando o nome
        $nome = $usuario["nome"];
        //pegando residencia
        $residencia = $usuario["residencia"];
        //pegando anos trabalhados
        $anosTrabalhados = $usuario["anos_trabalhados"];
        //pegando renda anual
        $rendaAnual = $usuario["renda_anual"];
        //pegando emprestimo
        $emprestimo = $usuario["emprestimo"];


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
        <?php echo "<h1>Bem vindo $nome, preencha os campos com os dados solicitados para completar o seu perfil. </h1>"
       ?>
        <div class="homeImg"><img src="/imagens/Home.jpg" alt="guardando dinheiro em um cofre" ></div>
        </div>
        <div class="right">
            <div class="containerInput">
                <h1 class="profile">Dados Bancários</h1>
            <form action="Analise.php" method="POST">
            
                <div class="inputbox">
                    <label for="residencia"><h1>Tipo de residência</h1></label>
                    <select name="residencia" id="residencia" class="inputHome" required >
                        <option disabled selected value=""><?php echo "$residencia"?></option>
                        <option value="Propria">Própria</option>
                        <option value="Hipoteca">Hipoteca</option>
                        <option value="Alugada">Alugada</option>
                        <option value="Outro">Outro tipo de posse</option>
                    </select>
                </div>
                <div class="inputbox">
                    <label for="anosTrabalhados" ><h1>Anos Trabalhados</h1></label>
                    <input type="number" name="anosTrabalhados" id="anosTrabalhados" placeholder="<?php echo "$anosTrabalhados anos"?>" required >
                </div>
                <div class="inputbox">
                    <label for="rendaAnual"><h1>Renda Anual</h1>
                     <input type="number" name="rendaAnual" id="rendaAnual" placeholder="<?php echo "R$ $rendaAnual"?>" required>
                </div>
                <div class="inputbox">
                    <label for="emprestimo"><h1>Valor do Empréstimo</h1>
                     <input type="number" name="emprestimo" id="emprestimo" placeholder="<?php echo "R$ $emprestimo"?>" required>
                </div>
                <div class="buttons">
                    <div class="buttonMeuperfil">
                    <a href="Home.php">
                        <h1>Meu Perfil</h1>
                    </a>
                    </div>
                    <div class="buttonProfile"><input   type="submit" name="submit"  class="buttonSubmitProfile" value="Editar"></input></div>
                </div>
            </div>
          </form>
        </div>
      </section>
    </div>
</body>
</html>