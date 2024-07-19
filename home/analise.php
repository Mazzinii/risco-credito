<?php
//iniciando a sessao
session_start();

//incluindo a conexao
include_once('../connection/conexao.php');

//pegando o email da sessao iniciada 
$email = $_SESSION['email'];

//verificando se o submit existe (só é acionado quando clicado em enviar)  
if(isset($_POST['submit'])){

    //declarando var que vem dos inputs
    $residencia = $_POST['residencia'];
    $anosTrabalhados = $_POST['anosTrabalhados'];
    $rendaAnual = $_POST['rendaAnual'];
    $emprestimo = $_POST['emprestimo'];
    
    //adicioando as variveis em seus respectivos lugares no banco de dados
    $sql = " UPDATE login SET residencia = ?, anos_trabalhados = ?, renda_anual = ?, emprestimo = ? WHERE email = '$email' ";

    //declarando a variavel que vai preparar a consulta
    $stmt = $mysqli->prepare($sql);
    
    if($stmt){
        //vinculando parametros
        $stmt->bind_param("ssii",$residencia,$anosTrabalhados,$rendaAnual,$emprestimo);
        
        if($stmt->execute()){
            echo "Dados atualizados com sucesso!";
        }else{
            echo "Erro ao atualizar os dados!";
        }


    }

}


?>