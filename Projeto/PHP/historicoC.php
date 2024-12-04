<?php
    session_start();
    include 'database.php';

    $sql = "SELECT * FROM historicochave";
    $results = '';

    if(isset($_POST['numero'])){
        $numero = $_POST['numero'];
        $andar = $_POST['andar'];

        $sql .=" WHERE 1 = 1";
        if (!empty($numero)){
            $sql .= " AND chave like '%$numero%'";
        }
    }

    $resultado = $conexao->query($sql);
    if ($resultado -> num_rows > 0){
        while ($linha = $resultado -> fetch_assoc()){
            $results .=  "<tr>
                            <td>{$linha['chave']}</td>
                            <td>{$linha['nome']}</td>   
                            <td>{$linha['hora']}</td>
                            <td>{$linha['data']}</td>                         
                            <td>{$linha['status']}</td>                         
                            <td>{$linha['nomeUsuario']}</td>                          
                        </tr>";                       
        }
    }

    else{
        $results = "<tr>
                        <td colspan = '5'>Nenhuma chave encontrada</td>
                    </tr>";                        
    }

    $_SESSION['historico'] = $results;

    $conexao -> close();
    header ("Location: ../VIEW/historico.php?");
    exit();

?>
