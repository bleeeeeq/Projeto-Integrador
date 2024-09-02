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

    $resultado = $conexao->query($sql);
    if ($resultado -> num_rows > 0){
        while ($linha = $resultado -> fetch_assoc()){
            if($linha['emuso'] === 'Não disponível'&& $linha['nomeUsuario'] == $_SESSION['nome']){
                $results .= "<tr>
                    <td>{$linha['chave']}</td>
                    <td>{$linha['nome']}</td>
                    <td>{$linha['emuso']}</td>
                    <td><form action='../PHP/devolverChaves.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='agendar_id' value='{$linha['idagenda']}'>
                        <button type='submit' name='agendar' style='background-color: #ffb509;'>Registrar</button>
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

    $_SESSION['results'] = $results;
    $conexao -> close();
    header ("Location: ../VIEW/devolverChave.php?");
    exit();
    
?>

