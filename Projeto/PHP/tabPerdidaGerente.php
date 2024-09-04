<?php
    session_start();
    include 'database.php';


    $sql = "SELECT * FROM agenda WHERE emuso LIKE '%Perdida%'";
    $results = '';
    if(isset($_POST['agendar_id'])){
        $idChave = $_POST['agendar_id'];

        $acontecimento = "";
        $especificar = "";
        $nomeUsuario = "";
        $emuso = "Disponível";

        /*$numChave = filter_input(INPUT_POST, 'numChave', FILTER_SANITIZE_STRING);
        $nome = filter_input(INPUT_POST, 'nomeSala', FILTER_SANITIZE_STRING);
        $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
        $hora = filter_input(INPUT_POST, 'hora', FILTER_SANITIZE_STRING);
        $nomeUsuario = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $emuso = filter_input(INPUT_POST, 'emuso', FILTER_SANITIZE_STRING);
        $idsala = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);*/

        $declaracaoBD = $conexao -> prepare("UPDATE `agenda` SET  `acontecimento` = ? , `especificar` = ? , `emuso` = ?, `nomeUsuario` = ? WHERE `idagenda` = ?");
        $declaracaoBD -> bind_param("ssssi", $acontecimento, $especificar, $emuso, $nomeUsuario, $idsala);

        if ($declaracaoBD -> execute()){
            echo "<script>
                    alert('Perfeito! Agora você pode pegar sua chave!');
                    window.location.href = '../VIEW/tabelaPerdidaGerente.php';
                </script>;";
        }
        else{
           echo "Erro ao realizar o agendamento da chave: ". $declaracaoBD->error;
       }
    exit();
        }
    
    $resultado = $conexao->query($sql);
    if ($resultado -> num_rows > 0){
        while ($linha = $resultado -> fetch_assoc()){
            if($linha['emuso'] === 'Perdida'){
                //$disabled = $linha['emuso'] === 'Perdida' ? 'disabled' : '';
                $results .= "<tr>
                    <td>{$linha['chave']}</td>
                    <td>{$linha['nome']}</td>
                    <td>{$linha['nomeUsuario']}</td>
                    <td>{$linha['acontecimento']}</td>
                    <td><form action='../PHP/tabPerdidaGerente.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='agendar_id' value='{$linha['idagenda']}'>
                        <button type='submit' name='agendar' style='background-color: #ffb509;'>Chave Encontrada</button>
                    </form></td>                            
                </tr>";                       

            }
        }
    }

    else{
        $results = "<tr>
                        <td colspan = '5'>Nenhuma chave encontrada</td>
                    </tr>";                        
    }

    $_SESSION['tabPerdidaGerente'] = $results;
    $conexao -> close();
    header ("Location: ../VIEW/tabelaPerdidaGerente.php?");
    exit();
    
?>

