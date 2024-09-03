<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="shortcut icon" href="../IMG/Utilitários/Logo.png" type="image/x-icon">
 
    <title>Senac Chaves</title>
 
</head>
 
<body>

 
    <!-- Home -->
    <?php
        include_once "Header.php";
    ?>
    <!-- Home -->
 
    <!--Tela Login-->
    <form action="../PHP/login.php" method="post" class="login">
 
        <div class="form-group">
          <label for="cpRA">Seu número de identificação</label>
          <input type="number" class="form-control" id="ra" name="cpRa" aria-describedby="emailHelp" placeholder="Sua identificação" required>
          <small id="emailHelp" class="form-text text-muted" style="align-items: center">Nunca vamos compartilhar sua Identificação, com ninguém.</small>
        </div>
 
        <div class="form-group">
          <label for="cpSenha">Senha</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="cpSenha" placeholder="Senha" required>
        </div>
 
        <button type="submit" src="../VIEW/index.html" name="logar" class="btn btn-primary">Logar</button>
    </form>

    <!--Footer-->
    <?php
		include_once "Footer.php"
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