<?php
session_start();
include 'database.php';

if(isset($_POST['Agendar'])){
            
    $numSala = filter_input(INPUT_POST, 'numSala', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nomeSala', FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
    $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
    $nomeUsuario = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $emuso = filter_input(INPUT_POST, 'emuso', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $idsala = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);


    
    $declaracaoBD = $conexao -> prepare("INSERT INTO `historicochave`(`chave`,`nome`,`data`,`hora`,`nomeUsuario`, `status`)VALUES(?,?,?,?,?,?)");
    $declaracaoBD -> bind_param("ssssss", $numSala, $nome, $data, $hora, $nomeUsuario, $status);
    $declaracaoBD -> execute();

    $declaracaoBD = $conexao -> prepare("UPDATE `agenda` SET  `nomeUsuario` = ? , `emuso` = ? WHERE `idagenda` = ?");
    $declaracaoBD -> bind_param("ssi", $nomeUsuario, $emuso, $idsala);
            
    if ($declaracaoBD -> execute()){
         echo "<script>
                 alert('Perfeito! Agora você pode pegar sua chave!');
                 window.location.href = '../VIEW/registroChaves.php';
             </script>;";
     }
     else{
        echo "Erro ao realizar o agendamento da chave: ". $declaracaoBD->error;
    }
     $declaracaoBD->close();
}