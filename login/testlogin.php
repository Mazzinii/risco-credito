<?php
//iniciando a sessão 
session_start();

    //print_r($_REQUEST);

    //se existir o submit acessa
    if(isseT($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['email'])) {        
        
        //incluindo a conexao
        include_once('../connection/conexao.php');

        //declarando as variaveis
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        
        //definindo a var que vai fazer a pesquisa no banco de dados
        $sql = "SELECT * FROM login WHERE email = '$email' LIMIT 1";  

        // executando pesquisa no banco de dados 
        $result = $mysqli->query($sql);

        $usuario =$result->fetch_assoc();

        //Permitindo login do adm
        if($email  == 'adm@gmail.com' && $senha == '2024@'){
            echo "login do ADM feito com sucesso";
        }

        elseif(mysqli_num_rows($result) < 1) {
            //destruindo qualquer sessao
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            // se nao exixtir o usuario vai permanecer na mesma pagina
            header('Location:wrongLogin.html');
            
        }elseif(password_verify($senha,$usuario['senha'])) {
            //se existir o usuario vai ser redirecionado para a pagina principal
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: ../home/home.php');
        }else{
            header('Location:wrongLogin.html');
        }



    }


?>