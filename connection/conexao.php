<?php

    //configurando a conexao com o banco de dados     
    $hostname = 'localhost';
    $bancodedados = 'usuarios'; // nome do banco de dados já criado 
    $usuario = 'root';
    $senha = '';

    //fazendo conexão
    $mysqli = new mysqli($hostname,$usuario,$senha,$bancodedados); 

    //tratando os erros 
    if ($mysqli->connect_errno) {
        echo "Falha ao conectar ao banco de dados: " . $mysqli->connect_error;
    }
    else 
        
    



?>