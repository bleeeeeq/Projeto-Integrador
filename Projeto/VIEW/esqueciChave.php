
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
    <link rel="stylesheet" href="../CSS/esqueciChave.css">
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

    <main>
        <div class="bTable">
    
            <div class="container">
                <h1>Esqueci minha chave</h1>
        
                <?php
                    if(isset($_SESSION['msg'])){
                        echo "<p style = 'color: #0000FF; text-align: center'> {$_SESSION['msg']} </p>";
                        unset($_SESSION['msg']);
                    }
                ?>
        
                <table id="classes-table">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Descrição</th>
                            <th>Opção</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        <!-- As chaves serão inseridas aqui -->
                        <?php
                            if(isset($_SESSION['results'])){
                                echo $_SESSION['results'];
                             //   unset($_SESSION['results']);
                            }
                        ?>
                    </tbody>
                </table>
        
                <div class="all-classes-button">
                    <form method="POST" action="../PHP/esqueciChave.php">
                        <button type="submit" name="all_classes">Carregar as Chaves</button>
                    </form>
                </div>
            </div>
    </main>
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