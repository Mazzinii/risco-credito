<?php
  //incluindo as config da aba conexao.php
  include_once('../connection/conexao.php');

  //declarando var que vai pesquisar se o email existe
  $email = $_POST['email'];
  $sql = "SELECT * FROM login WHERE email = '$email'";
  $result = $mysqli->query($sql);

   //verificando se o submit existe (só é acionado quando clicado em enviar)    
  if( isset($_POST['submit']) && isset($_POST['senha']) && isset($_POST['confirmsenha'])) {
    //verificando se o campo de senha e confirmar senha sao iguais
     if(($_POST['senha']) != ($_POST['confirmsenha'])) {
      echo "<script>alert('As senhas não são iguais!')</script>";
      
    }if($result->num_rows > 0){//verificando se o email ja existe
      header('Location: emailAlredyExist.html');
      

    }else {
      

      // definindo variaveis com os campos input pelo id
      $nome = $_POST['nome'];
      $nasc = $_POST['nasc'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];

      //criptografando senha
      $hash = password_hash($senha, PASSWORD_DEFAULT);

      //calculando idade do usuário
      $hoje = new Datetime();
      $nasc = new Datetime($nasc);

      //calculando a diferença entre as duas datas
      $idade = $hoje->diff($nasc);
      
      //representando os anos de diferença entre cada data
      $idade = $idade->y;

      //adicioando as variveis em seus respectivos lugares no banco de dados
      $result = mysqli_query($mysqli, "INSERT INTO login(nome,idade,email,senha) VALUES ('$nome','$idade','$email','$hash')");

      header('Location: ../login/login.html');
    }
  }
?>
