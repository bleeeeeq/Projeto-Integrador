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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/tabela.css">
    <title>Senac Chaves</title>
</head>

<body>
    <?php
        include_once "Header.php";
    ?>

<div class="bTable">
    
    <div class="container">

        <form class="search-form" method="POST" action="../PHP/historicoC.php">
            <input type="text" name="numero" placeholder="Número da Sala">
            <button type="submit">Buscar</button>
        </form>

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
                    <th>Sala</th>
                    <th>Hora</th>
                    <th>Data</th>
                    <th>Nome</th>
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
            <form method="POST" action="../PHP/historicoC.php">
                <button type="submit" name="all_classes">Todas as Chaves</button>
            </form>
        </div>
    </div>
</div>

    <?php
        include_once "Footer.php";
    ?>
</body>
</html>
