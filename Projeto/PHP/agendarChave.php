<?php
session_start();
include 'database.php';

if(isset($_POST['Agendar'])){
            
            $numSala = filter_input(INPUT_POST, 'numSala', FILTER_SANITIZE_STRING);
            $nome = filter_input(INPUT_POST, 'nomeSala', FILTER_SANITIZE_STRING);
            $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
            $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
            $nomeUsuario = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

            $declaracaoBD = $conexao -> prepare("INSERT INTO `historicochave`(`chave`,`nome`,`data`,`hora`,`nomeUsuario`)VALUES(?,?,?,?,?)");
            $declaracaoBD -> bind_param("sssss", $numSala, $nome, $data, $hora, $nomeUsuario);
            
            if ($declaracaoBD -> execute()){
                echo "<script>
                        alert('Perfeito! Agora você pode pegar sua chave!');
                        window.location.href = '../PHP/cadUsuario.php';
                    </script>;";
            }
            else{
                echo "Erro ao realizar o agendamento da chave: ". $declaracaoBD->error;
            }
}