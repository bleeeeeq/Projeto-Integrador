<?php
    $user = "root";
    $password = "1234";
    $bd = "senacchaves";
    $host = "localhost";

    try{
        $conexao = mysqli_connect($host, $user, $password, $bd);

        if($conexao->connect_errno){
            throw new Exception("Falha ao se conectar: ( ". $conexao->connect_errno . " )" .$conexao->connect_error);
        }       

        echo "Conexão funcionando!";
    } 

    catch (Exception $e){
        echo $e->getMessage();
    }
?>