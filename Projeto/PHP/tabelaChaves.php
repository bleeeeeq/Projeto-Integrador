<?php
    session_start();
    include 'database.php';

    if(isset($_POST['agendar_id'])){
        $id = $_POST['agendar_id'];
        echo"<script>
            if(confirm('Você realmente deseja agendar essa chave?')){
                window.location.href = '../VIEW/agdChave.php?id=$id';
            }
            else{
                window.location.href = '../VIEW/tabChaves.php';
            }
    </script>";
    exit();
    }

    $sql = "SELECT * FROM chave";
    $results = '';

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

    $resultado = $conexao->query($sql);
    if ($resultado -> num_rows > 0){
        while ($linha = $resultado -> fetch_assoc()){
            $results .=  "<tr>
                            <td>{$linha['numero']}</td>
                            <td>{$linha['andar']}</td>
                            <td>{$linha['descricao']}</td>
                            <td><form action='../PHP/tabelaChaves.php' method='POST' style ='display: inline;'>
                                <input type='hidden' name='agendar_id' value='{$linha['idchave']}'>
                                <button type='submit' name='agendar' style='background-color: #ffb509;'>Agendar</button>
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
    header ("Location: ../VIEW/tabChaves.php?");
    exit();

?>
