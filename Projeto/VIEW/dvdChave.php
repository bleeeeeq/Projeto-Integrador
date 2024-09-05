<?php
    session_start();
    if(isset($_SESSION['nome'])){
        $nomeUsuario = $_SESSION['nome'];
    }

    else{
        header("location: login.php");
    }
?>

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

    <title>Senac Chaves</title>
</head>

<body>
    <!--Header-->
    <?php
    if (isset($_SESSION['gerencia']) && $_SESSION['gerencia'] == 1) {
        
        include_once "HeaderGerente.php";
    }
    else{
        include_once "Header.php";
    }
    ?>
    
    <!--Header-->

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
        $emuso = 'Disponível';
        $status = "Chave devolvida";
        
        // Verifica se um ID foi passado na URL
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Busca os dados da chave pelo ID
            $sql = "SELECT * FROM chave WHERE idchave = ?";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            // Preenche os campos do formulário com os dados da aula
            if ($resultado->num_rows > 0) {
                $linha = $resultado->fetch_assoc();
             //   $nomeUsuario = $linha['nome'];
                $numero = $linha['numero'];
                $andar = $linha['andar'];
                $descricao = $linha['descricao'];
            }
            
            $stmt->close();
        }  

        $conexao->close();
        ?>

    </div>
    <h1>Devolver Chave</h1>
        <form class="cadastro" action="../PHP/dvdChave.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="nome" value="<?php echo $nomeUsuario; ?>">
            <input type="hidden" name="emuso" value="<?php echo $emuso; ?>">
            <input type="hidden" name="status" value="<?php echo $status; ?>">

            <div class="form-group">
                <label for="numSala">Número da sala</label>
                <input type="text" readonly class="form-control" name="numChave" id="idSala" oninput="mascaraSala(this)" placeholder="Digite o número da sala" required value="<?php echo htmlspecialchars($numero); ?>" >
            </div>

            <div class="form-group">
                <label for="andar">Selecione o Andar</label>
                <select class="form-control" name="andar" disabled >
                    <option value="Térreo" <?php if ($andar == 'Térreo') echo 'selected'; ?>>Térreo</option>
                    <option value="1° andar" <?php if ($andar == '1° andar') echo 'selected'; ?>>1° andar</option>
                    <option value="2° andar" <?php if ($andar == '2° andar') echo 'selected'; ?>>2° andar</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nomeSala">Nome da sala:</label>
                <input type="text" readonly class="form-control" name="nomeSala" id="exampleInputPassword1" placeholder="Identificação da sala" required value="<?php echo htmlspecialchars($descricao); ?>"  >
            </div>

            <div class="form-group">
                <label for="data">Dia</label>
                <input type="date" readonly name="data" id="dataField" class="form-control"  >
            </div>

            <div class="form-group">
                <label for="time">Hora</label>
                <input type="time" readonly name="hora" id="horaField" class="form-control" >
            </div>

            <div id="idButton">
                <button type="submit" name="Agendar" class="btn btn-primary">CONFIRMAR</button>
            </div>
        </form>
        <!--Formulario-->

    </main>

    <!--Footer-->
    <?php
		include_once "Footer.php"
	?>
     <!--Footer-->

    <script>
        // Máscaras
        function mascaraSala(Sala) {
            Sala.value = Sala.value.replace(/\D/g, "")
        }

        // Puxar a data do sistema
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('dataField').value = today;
        });

        // Puxando a hora do sistema
        document.addEventListener('DOMContentLoaded', function() {
        var now = new Date();
        var hours = String(now.getHours()).padStart(2, '0');
        var minutes = String(now.getMinutes()).padStart(2, '0');
        var currentTime = hours + ':' + minutes;
        document.getElementById('horaField').value = currentTime;
    });
    </script>

    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
   <!-- script -->

</body>
</html>