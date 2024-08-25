<?php
session_start();
include 'database.php';

if(isset($_POST['Cadastrar'])){

    $numSala = filter_input(INPUT_POST, 'numSala' , FILTER_SANITIZE_STRING);

        $declaracao=$conexao->prepare("select numero from chave where numero = ?");
        $declaracao->bind_param("s",$numSala);
        $declaracao->execute();
        $declaracao->store_result();
        
        if($declaracao->num_rows>0){
            echo"<script>
                  alert('Essa sala já foi cadastrada!');
                  window.location.href ='../VIEW/cadChave.html'
                </script>";
        }
        else{
            $andar = filter_input(INPUT_POST, 'andar' , FILTER_SANITIZE_STRING);
            $nomeSala = filter_input(INPUT_POST, 'nomeSala' , FILTER_SANITIZE_STRING);

            $declaracaoBD = $conexao -> prepare("INSERT INTO `chave`(`numero`,`andar`,`descricao`)VALUES(?,?,?)");
            $declaracaoBD -> bind_param("sss", $numSala, $andar, $nomeSala);
            
            if ($declaracaoBD -> execute()){
                echo "<script>
                        alert('Sala cadastrada com sucesso!');
                        window.location.href = '../VIEW/cadChave.html';
                    </script>;";
            }
            else{
                echo "Erro ao cadastrar a sala: ". $declaracaoBD->error;
            }
        }
}