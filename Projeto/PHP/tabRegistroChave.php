<?php
    session_start();
    include 'database.php';

    if(isset($_POST['agendar_id'])){
        $id = $_POST['agendar_id'];
        echo"<script>
                window.location.href = '../VIEW/agendarChave.php?id=$id';
    </script>";
    exit();
        }
    
    if(isset($_POST['numero']) || isset($_POST['andar'])){
        $numero = $_POST['numero'];
        $andar = $_POST['andar'];

        $sql .=" WHERE 1 = 1";
        if (!empty($numero)){
            $sql .= " AND numero like '%$numero%'";
        }
        if (!empty($andar)){
            $sql .= " AND andar like '%$andar%'";
        }
    }
    $sql = "SELECT * FROM chave";
    $results = '';
    $resultado = $conexao->query($sql);
    if ($resultado -> num_rows > 0){
        while ($linha = $resultado -> fetch_assoc()){
            $results .=  "<tr>
                            <td>{$linha['numero']}</td>
                            <td>{$linha['descricao']}</td>
                            <td><form action='../PHP/tabelaChaves.php' method='POST' style ='display: inline;'>
                                <input type='hidden' name='agendar_id' value='{$linha['idchave']}'>
                                <button type='submit' name='agendar' style='background-color: #ffb509;'>Registrar</button>
                            </form></td>                            
                        </tr>";                       
        }
    }

    else{
        $results = "<tr>
                        <td colspan = '5'>Nenhuma chave encontrada</td>
                    </tr>";                        
    }

    $_SESSION['results'] = $results;
    $conexao -> close();
    header ("Location: ../VIEW/registroChaves.php?");
    exit();
    
?>

