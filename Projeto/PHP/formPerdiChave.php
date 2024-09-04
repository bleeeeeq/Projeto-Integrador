<?php
session_start();
include 'database.php';

if(isset($_POST['Enviar'])){
            
    $numSala = filter_input(INPUT_POST, 'numSala', FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nomeSala', FILTER_SANITIZE_STRING);
    $acontecimento = filter_input(INPUT_POST, 'acontecimento', FILTER_SANITIZE_STRING);
    $especificar = filter_input(INPUT_POST, 'especificar', FILTER_SANITIZE_STRING);
    $nomeUsuario = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $emuso = filter_input(INPUT_POST, 'emuso', FILTER_SANITIZE_STRING);
    $idsala = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    
    /*$declaracaoBD = $conexao -> prepare("INSERT INTO `historicochave`(`chave`,`nome`,`data`,`hora`,`nomeUsuario`)VALUES(?,?,?,?,?)");
    $declaracaoBD -> bind_param("sssss", $numSala, $nome, $data, $hora, $nomeUsuario);
    $declaracaoBD -> execute();*/

    $declaracaoBD = $conexao -> prepare("UPDATE `agenda` SET  `nomeUsuario` = ? , `emuso` = ?, `acontecimento` = ? , `especificar` = ?  WHERE `idagenda` = ?");
    $declaracaoBD -> bind_param("ssssi", $nomeUsuario, $emuso, $acontecimento, $especificar, $idsala);
            
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