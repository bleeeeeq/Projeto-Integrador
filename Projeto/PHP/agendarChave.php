<?php
session_start();
include 'database.php';

if(isset($_POST['Registrar'])){
            
            $numSala = filter_input(INPUT_POST, 'numSala', FILTER_SANITIZE_STRING);
            $nomeSala = filter_input(INPUT_POST, 'nomeSala', FILTER_SANITIZE_STRING);
            $dia = filter_input(INPUT_POST, 'dia', FILTER_SANITIZE_STRING);
            $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
            $declaracaoBD = $conexao -> prepare("INSERT INTO `historicochave`(`chave`,`nome`,`dia`,`hora`)VALUES(?,?,?,?)");
            $declaracaoBD -> bind_param("ssss", $numSala, $nomeSala, $dia, $hora);
            
            if ($declaracaoBD -> execute()){
                echo "<script>
                        alert('Chave registrada com sucesso!');
                        window.location.href = '#';
                    </script>;";
            }
            else{
                echo "Erro ao registrar a chave: ". $declaracaoBD->error;
            }
}