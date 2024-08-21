<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/styleCadChave.css">
    <link rel="shortcut icon" href="../IMG/Utilitários/Logo.png" type="image/x-icon">

    <title>Cadastrar chave</title>
</head>

<body>
    <?php
		include_once "Header.php"
	?>

    <!-- Formulário -->
    <main>
    <div class="container">       
        <?php
        include '../PHP/database.php';
        
        // Inicializa as variáveis
        $id = '';
        $numero = '';
        $andar = '';
        $descricao = '';
        
        // Verifica se um ID foi passado na URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            ?>
            <h1 style="text-align:center">Agendar Chave</h1>
            <?php
            
            // Busca os dados da chave pelo ID
            $sql = "SELECT * FROM chave WHERE idchave = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            // Preenche os campos do formulário com os dados da aula
            if ($resultado->num_rows > 0) {
                $linha = $resultado->fetch_assoc();
                $numero = $linha['numero'];
                $andar = $linha['andar'];
                $descricao = $linha['descricao'];
            }
            
            $stmt->close();
        }  

        else{
            ?>
            <h1 style="text-align:center">Cadastrar Chave</h1>
            <?php
        }     
        $conexao->close();
        ?>

    </div>
        <form class="cadastro" action="../PHP/cadastroChave.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="numSala">Número da sala</label>
                <input type="text" class="form-control" name="numSala" id="numSala" oninput="mascaraSala(this)" placeholder="Digite o número da sala" required value="<?php echo $numero; ?>">
            </div>

            <div class="form-group">
                <label for="andar">Selecione o Andar</label>
                <select class="form-control" name="andar">
                    <option value="Térreo" <?php if ($andar == 'Térreo') echo 'selected'; ?>>Térreo</option>
                    <option value="1° andar" <?php if ($andar == '1° andar') echo 'selected'; ?>>1° andar</option>
                    <option value="2° andar" <?php if ($andar == '2° andar') echo 'selected'; ?>>2° andar</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nomeSala">Nome da sala</label>
                <input type="text" class="form-control" name="nomeSala" id="exampleInputPassword1" placeholder="Identificação da sala" required value="<?php echo $descricao; ?>">
            </div>

            <div id="idButton">
                <button type="submit" name="Cadastrar" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
        <!--Formulario-->

    </main>

    <?php
		include_once "Footer.php"
	?>
    <script>
        // Máscaras
        function mascaraSala(Sala) {
            Sala.value = Sala.value.replace(/\D/g, "")
        }
    </script>

</body>
</html>