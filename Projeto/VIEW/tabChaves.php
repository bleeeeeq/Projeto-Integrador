<?php
    session_start();
    /*if(isset($_SESSION['nome'])){
        $nomeUsuario = $_SESSION['nome'];
    }

    else{
        header("location: login.html");
    }*/ 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Senac Chaves</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            width: 80%;
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-form {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .search-form input[type="text"] {
            width: 48%;
            padding: 10px;
            font-size: 16px;
        }
        .search-form button {
            background-color: #ffb509;
            padding: 10px 20px;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 50px;
        }
        th, td {
            background-color: white;
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
            background-color: rgba(104, 163, 252, 0.596);
        }
        th {
            background-color: rgba(18, 99, 219, 0.596);
        }
        .all-classes-button {
            display: flex;
            justify-content: flex-end;
        }
        .all-classes-button button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ffb509;
        }
    </style>
</head>

<body>
    <?php
        //include_once "Header.php";
    ?>

    <div class="container">
        <h1>Chaves do gigantesco senacs chaves nozama</h1>
        <form class="search-form" method="POST" action="../PHP/tabelaChaves.php">
            <input type="text" name="andar" placeholder="Andar">
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
                    <th>Andar</th>
                    <th>Descrição</th>
                    <th>Opção</th>
                </tr>
            </thead>

            <tbody>
                <!-- As chaves serão inseridas aqui -->
                <?php
                    if(isset($_SESSION['results'])){
                        echo $_SESSION['results'];
                        unset($_SESSION['results']);
                    }
                ?>
            </tbody>
        </table>

        <div class="all-classes-button">
            <form method="POST" action="../PHP/tabelaChaves.php">
                <button type="submit" name="all_classes">Todas as Chaves</button>
            </form>
        </div>

    </div>
    <?php
        include_once "Footer.php";
    ?>
</body>
</html>
