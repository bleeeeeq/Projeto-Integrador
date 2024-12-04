<?php
    session_start();
    include 'database.php';

    $sql = "SELECT * FROM agenda";
    $results = '';
    if(isset($_POST['perdi_id'])){
        $idChave = $_POST['perdi_id'];
        echo"<script>
                window.location.href = '../VIEW/formPerdiChave.php?id=$idChave';
    </script>";
    exit();
        }

    $resultado = $conexao->query($sql);
    if ($resultado -> num_rows > 0){
        while ($linha = $resultado -> fetch_assoc()){
            if($linha['emuso'] === 'Não disponível'&& $linha['nomeUsuario'] == $_SESSION['nome']){
                $results .= "<tr>
                    <td>{$linha['chave']}</td>
                    <td>{$linha['nome']}</td>
                    <td>{$linha['emuso']}</td>
                    <td><form action='../PHP/esqueciChave.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='perdi_id' value='{$linha['idagenda']}'>
                        <button type='submit' name='perdi' style='background-color: #ffb509;'>Perdi chave</button>
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

    $_SESSION['perdi'] = $results;
    $conexao -> close();
    header ("Location: ../VIEW/esqueciChave.php?");
    exit();
    
?>

