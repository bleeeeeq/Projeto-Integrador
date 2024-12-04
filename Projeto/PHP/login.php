<?php
session_start();
include 'database.php';
 
if(isset($_POST['logar'])){
    $ra = filter_input(INPUT_POST,'cpRa',FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST,'cpSenha',FILTER_SANITIZE_STRING);
       
    if(strlen($_POST['cpRa'])==0){
        echo "<script>
            alert('Preencha o campo de identificação')
            window.location.href= '../VIEW/login.php'
            </script>";
         
        //echo "Preencha o campo email.";
    }
    else if(strlen($_POST['cpSenha'])==0){
        echo "<script>
                alert('Preencha o campo senha')
                window.location.href= '../VIEW/login.php'
                </script>";
        //echo "Preencha o campo senha.";
    }
    else{
        $stmt = $conexao->prepare("select ra,idusuario, nome, gerencia from usuario where senha = ? and ra = ?");
        $stmt->bind_param("ss", $senha, $ra);
        $stmt->execute();
        $result = $stmt->get_result();
 
        if($result->num_rows == 1){
            $usuario = $result->fetch_assoc();
            $_SESSION['id'] = $usuario['idusuario'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['gerencia'] = $usuario['gerencia'];
            echo "<script>
                window.location.href= '../VIEW/index.php'
            </script>";
            exit;
        }
 
        else{
            echo "<script>
                alert('Identificação ou Senha incorretos')
                window.location.href= '../VIEW/login.php'
                </script>";
            exit;
        }
    }
}
?>