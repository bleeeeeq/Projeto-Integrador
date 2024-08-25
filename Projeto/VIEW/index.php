<?php
session_start();
if (isset($_SESSION['nome'])) {
    $nomeUsuario = $_SESSION['nome'];
} else {
    header("location: login.html");
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
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="shortcut icon" href="../IMG/Utilitários/Logo.png" type="image/x-icon">
    <title>Senac Chaves</title>
</head>

<body>
    <!--Header-->
    <?php
    include_once "Header.php"
    ?>
    <!--Header-->

    <!--menu-->

    <div id="textoBemVindo">
        <h1>Olá, <?php echo htmlspecialchars($nomeUsuario) ?></h1>
        <p>Escolha o que deseja fazer:</p>
    </div>

        <div id="ItensMenu">
            <a href="tabChaves.php">Registro de chaves</a>
            <a href="#">Agendar chave</a>
            <a href="#">Historico de chaves</a>
            <a href="#">Perdi minha chave</a>
            <a href="#">Cadastrar Usuário</a>
        </div>

    <!--menu-->

    <!--Footer-->
    <?php
    include_once "Footer.php";
    ?>
    <!--Footer-->

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