<?php
    session_start();
    include 'database.php';


    $sql = "SELECT * FROM agenda";
    $results = '';
    if(isset($_POST['devolver_id'])){
        $idChave = $_POST['devolver_id'];
        echo"<script>
                window.location.href = '../VIEW/dvdChave.php?id=$idChave';
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
                        <input type='hidden' name='devolver_id' value='{$linha['idagenda']}'>
                        <button type='submit' name='devolver' style='background-color: #ffb509;'>Devolver chave</button>
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

    $_SESSION['devolver'] = $results;
    $conexao -> close();
    header ("Location: ../VIEW/devolverChave.php?");
    exit();
    
?>

