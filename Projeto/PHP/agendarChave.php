<?php
session_start();
include 'database.php';

//parei aqui querido :)
//arrumar conexão com o banco para permitir o registro da chave, e mostrar esse determinado registro no histórico

if(isset($_POST['Registrar'])){
            
            $numSala = filter_input(INPUT_POST, 'numSala', FILTER_SANITIZE_STRING);
            $nomeSala = filter_input(INPUT_POST, 'nomeSala', FILTER_SANITIZE_STRING);
            $dia = filter_input(INPUT_POST, 'dia', FILTER_SANITIZE_STRING);
            $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
            $nomeUsuario = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
            $declaracaoBD = $conexao -> prepare("INSERT INTO `historicochave`(`chave`,`nome`,`dia`,`hora`,`nomeUsuario)VALUES(?,?,?,?,?)");
            $declaracaoBD -> bind_param("sssss", $numSala, $nomeSala, $dia, $hora, $nomeUsuario);
            
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