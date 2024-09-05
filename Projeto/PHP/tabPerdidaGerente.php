<?php
    session_start();
    include 'database.php';

    $sql = "SELECT * FROM agenda WHERE emuso LIKE '%Perdida%'";
    $results = '';

    if(isset($_POST['agendar_id'])){
        $idChave = $_POST['agendar_id'];

        // Inicializa variáveis
        $acontecimento = empty($_POST['acontecimento']) ? null : $_POST['acontecimento'];
        $especificar = empty($_POST['especificar']) ? null : $_POST['especificar'];
        $nomeUsuario = empty($_POST['nomeUsuario']) ? null : $_POST['nomeUsuario'];
        $emuso = "Disponível";

        // Corrige a variável usada para a atualização
        $declaracaoBD = $conexao->prepare("UPDATE `agenda` SET `acontecimento` = ?, `especificar` = ?, `emuso` = ?, `nomeUsuario` = ? WHERE `idagenda` = ?");
        $declaracaoBD->bind_param("ssssi", $acontecimento, $especificar, $emuso, $nomeUsuario, $idChave);

        if ($declaracaoBD->execute()) {
            echo "<script>
                    alert('Chave reposta com sucesso. Agora ela está disponível novamente!');
                    window.location.href = '../VIEW/tabelaPerdidaGerente.php';
                </script>";
            exit();
        } else {
            echo "Erro ao realizar o agendamento da chave: ". $declaracaoBD->error;
        }
    }

    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            if($linha['emuso'] === 'Perdida') {
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
    } else {
        $results = "<tr><td colspan='5'>Nenhuma chave encontrada</td></tr>";
    }

    $_SESSION['tabPerdidaGerente'] = $results;
    $conexao->close();
    header("Location: ../VIEW/tabelaPerdidaGerente.php");
    exit();
?>
