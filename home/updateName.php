<?php 

//iniciando sessao
session_start();

//pegando o email da sessao iniciada 
$email = $_SESSION['email'];

//declarando var
$nome = $_POST['nomeHome'];



//se exitir o submit eo campo nome
if(isset($_POST['submit']) && isset($_POST['nomeHome'])){
    //incluindo conexao
    include_once('../connection/conexao.php');

    $sql = " UPDATE login SET nome = ? WHERE email = '$email' ";

    //declarando a variavel que vai preparar a consulta
    $stmt = $mysqli->prepare($sql);

    if($stmt){
        //vinculando parametros
        $stmt->bind_param("s",$nome);

        if($stmt->execute()){
            echo "Nome alterado com sucesso!";
        }else{
            echo "Erro ao alterar o nome!";
        }

    }

}
?>