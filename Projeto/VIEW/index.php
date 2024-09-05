<?php
    session_start();
    if (isset($_SESSION['nome'])) {
        $nomeUsuario = $_SESSION['nome'];
    } else {
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
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/carrosel.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="shortcut icon" href="../IMG/Utilitários/Logo.png" type="image/x-icon">
    <title>Senac Chaves</title>
</head>


<body>
    <!--Header-->
    <?php
    if (isset($_SESSION['gerencia']) && $_SESSION['gerencia'] == 1) {

        include_once "HeaderGerente.php";
    } else {
        include_once "Header.php";
    }
    ?>
    
    <!-- Carrosel -->

    <div class="container-slider">
        <button id="prev-button"><img src="../IMG/Index/arrow.png" alt="prev-button"></button>
            <div class="container-images">
                <img src="../IMG/Index/chave1.jpg" alt="chave" class="slider on">
                <img src="../IMG/Index/chave2.jpg" alt="chave" class="slider">
                <img src="../IMG/Index/chave3.jpg" alt="chave" class="slider">
            </div>
        <button id="next-button"><img src="../IMG/Index/arrow.png" alt="next-button"></button>
    </div>
    <!-- Carrosel -->

    <!--Header-->
    <main>
        <div id="textoBemVindo">
            <h1>Olá, <?php echo htmlspecialchars($nomeUsuario) ?></h1>
            <p>Escolha o que deseja fazer:</p>
        </div>

        <?php
    if (isset($_SESSION['gerencia']) && $_SESSION['gerencia'] == 1) {

        include_once "menuGerente.php";

    } else {
        include_once "menuUsuario.php";
    }
    ?>
    </main>
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

    <!--Script Carrosel-->

    <script>
        const slider = document.querySelectorAll('.slider');
        const btnPrev = document.getElementById('prev-button');
        const btnNext = document.getElementById('next-button');
 
        let currentSlide = 0;
 
        function hideSlider() {
            slider.forEach(item => item.classList.remove('on'))
        }  
 
        function showSlider() {
            slider[currentSlide].classList.add('on')
        }      
 
        function nextSlider() {
            hideSlider()
        if(currentSlide === slider.length -1) {
            currentSlide = 0
        } else {
            currentSlide++
        }
        showSlider()
        }
 
        function prevSlider() {
            hideSlider()
        if(currentSlide === 0) {
            currentSlide = slider.length -1
        } else {
            currentSlide--
        }
        showSlider()
        }
 
        btnNext.addEventListener('click', nextSlider)
        btnPrev.addEventListener('click', prevSlider)
 
        // Adiciona a função para mudar de slide automaticamente a cada 5 segundos (5000ms)
        setInterval(nextSlider, 4000);
    </script>

    <!--Script Carrosel-->
</body>

</html>