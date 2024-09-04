<?php
    session_start();
    include 'database.php';


    $sql = "SELECT * FROM agenda";
    $results = '';
    if(isset($_POST['agendar_id'])){
        $idChave = $_POST['agendar_id'];
        echo"<script>
                window.location.href = '../VIEW/agdChave.php?id=$idChave';
    </script>";
    exit();
        }
    
    if(isset($_POST['numero']) || isset($_POST['andar'])){
        $numero = $_POST['numero'];
        $andar = $_POST['andar'];

        $sql .=" WHERE 1 = 1";
        if (!empty($numero)){
            $sql .= " AND chave like '%$numero%'";
        }
        if (!empty($andar)){
            $sql .= " AND chave like '%$andar%'";
        }
    }

    $resultado = $conexao->query($sql);
    if ($resultado -> num_rows > 0){
        while ($linha = $resultado -> fetch_assoc()){
            if($linha['emuso'] === 'Não disponível'){
                $disabled = $linha['emuso'] === 'Não disponível' ? 'disabled' : '';
                $results .= "<tr>
                    <td>{$linha['chave']}</td>
                    <td>{$linha['nome']}</td>
                    <td>{$linha['emuso']}</td>
                    <td><form action='../PHP/tabRegistroChaves.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='agendar_id' value='{$linha['idagenda']}'>
                        <button type='submit' name='agendar' style='background-color: #ffb509;' $disabled>Chave em uso</button>
                    </form></td>                            
                </tr>";                       

            }

            else if($linha['emuso'] === 'Perdida'){
                $disabled = $linha['emuso'] === 'Perdida' ? 'disabled' : '';
                $results .= "<tr>
                    <td>{$linha['chave']}</td>
                    <td>{$linha['nome']}</td>
                    <td>{$linha['emuso']}</td>
                    <td><form action='../PHP/tabRegistroChaves.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='agendar_id' value='{$linha['idagenda']}'>
                        <button type='submit' name='agendar' style='background-color: #ffb509;' $disabled>Chave Perdida</button>
                    </form></td>                            
                </tr>";                       

            }

            else{
            $results .=  "<tr>
                            <td>{$linha['chave']}</td>
                            <td>{$linha['nome']}</td>
                            <td>{$linha['emuso']}</td>
                            <td><form action='../PHP/tabRegistroChave.php' method='POST' style ='display: inline;'>
                                <input type='hidden' name='agendar_id' value='{$linha['idagenda']}'>
                                <button type='submit' name='agendar' style='background-color: #ffb509;'>Pegar Chave</button>
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

    $_SESSION['tabRegistroChave'] = $results;
    $conexao -> close();
    header ("Location: ../VIEW/registroChaves.php?");
    exit();
    
?>

