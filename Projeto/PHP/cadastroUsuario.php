<?php
session_start();
include 'database.php';

if(isset($_POST['btnCad'])){
    $nome = filter_input(INPUT_POST, 'nome' , FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha' , FILTER_SANITIZE_STRING);
    $ra = filter_input(INPUT_POST, 'ra' , FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco' , FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade' , FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, 'estado' , FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep' , FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf' , FILTER_SANITIZE_STRING);
    $gerencia = filter_input(INPUT_POST, 'gerente' , FILTER_SANITIZE_STRING);
    
    if(empty($nome) || empty($email) || empty($senha) || empty($ra) || empty($endereco) || empty($cidade) || empty($estado) || empty($cep) || empty($cpf)){
        echo "<script>
                alert('Preencha todos os campos!');
                window.location.href ='../VIEW/cadUsuario.php';
            </script>";
        exit;
    }
    

        // Verificar se o CPF já foi cadastrado
        $declaracao=$conexao->prepare("select cpf from usuario where cpf = ?");
        $declaracao->bind_param("s",$cpf);
        $declaracao->execute();
        $declaracao->store_result();
        
        if($declaracao->num_rows>0){
            echo"<script>
                  alert('Esse CPF já foi cadastrado no sistema!');
                  window.location.href ='../VIEW/cadUsuario.php'
                </script>";

            exit;
            $declaracao->close();
            }

        // Cadastra as informações no banco
            $declaracao = $conexao->prepare("INSERT INTO `usuario`(`nome`,`email`,`senha`,`ra`,`endereco`,`cidade`,`estado`,`cep`,`cpf`,`gerencia`)VALUES(?,?,?,?,?,?,?,?,?,?);");

            $declaracao->bind_param("sssssssssi", $nome, $email, $senha, $ra, $endereco, $cidade, $estado,$cep , $cpf, $gerencia);
            if ($declaracao->execute()){
                echo" <script>
                    alert('Usuário cadastrado com sucesso');
                     window.location.href ='../VIEW/index.php'
                </script>";
            }
    
            else{
                echo "Erro ao cadastrar um usuário: " . $declaracao->error;
            }
            $declaracao->close();
}
    