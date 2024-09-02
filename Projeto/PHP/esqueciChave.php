<?php
    session_start();
    include 'database.php';


    $sql = "SELECT * FROM agenda";
    $results = '';
    if(isset($_POST['btn_chavePerdida'])){
        $id = $_POST['btn_chavePerdida'];
        echo"<script>
                window.location.href = '../VIEW/agendarChave.php?id=$id';
    </script>";
    exit();
        }
    
    if(isset($_SESSION['nome'])){
        $nome = $_SESSION['nome'];

        $sql .=" WHERE 1 = 1";
        if (!empty($nome)){
            $sql .= " AND nome like '%$nome%'";
        }
        else{
            echo "<script> alert('O nome do usuário não foi encontrado(erro na session nome)')";
        }
    }

    $resultado = $conexao->query($sql);
    if ($resultado -> num_rows > 0){
        while ($linha = $resultado -> fetch_assoc()){
            if($linha['registrado'] === 'Não disponível'){
                $disabled = $linha['registrado'] === 'Não disponível' ? 'disabled' : '';
                if($linha['nomeUsuario'] === $nome){
                    $results .= "<tr>
                    <td>{$linha['numero']}</td>
                    <td>{$linha['descricao']}</td>
                    <td><form action='../PHP/tabRegistroChaves.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='btn_chavePerdida' value='{$linha['idchave']}'>
                        <button type='submit' name='agendar' style='background-color: #ffb509;'>Chave perdida</button>
                    </form></td>                            
                </tr>";     
                }            
            }
            else{

            }       
        }
    }

    else{
        $results = "<tr>
                        <td colspan = '5'>Nenhuma chave encontrada</td>
                    </tr>";                        
    }

    $_SESSION['esqueciChave'] = $results;
    $conexao -> close();
    header ("Location: ../VIEW/esqueciChave.php?");
    exit();
    
?>