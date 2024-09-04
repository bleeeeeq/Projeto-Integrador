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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/FAQ.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../IMG/Utilitários/Logo.png" type="image/x-icon">
    <title>Senac Chaves</title>
</head>

<body>

    <?php
    if (isset($_SESSION['gerencia']) && $_SESSION['gerencia'] == 1) {

        include_once "HeaderGerente.php";
    } else {
        include_once "Header.php";
    }
    ?>

    
    <main>
        <div class="faq_area section_padding_130" id="faq">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-lg-6">
                        <!-- Section Heading-->
                        <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <h3><span>Perguntas </span> Frequentes</h3>
                            <p>Cadê a Chave é um novo sistema do Senac para administrar &amp; auxiliar no gerenciamento das chaves, tornando tudo mais fácil e prático para os usuários</p>
                            <div class="line"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <!-- FAQ Area-->
                    <div class="col-12 col-sm-10 col-lg-8">
                        <div class="accordion faq-accordian" id="faqAccordion">
                            <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <div class="card-header" id="headingOne">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Como chegar até a página de cadastro?<span class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>Na parte superior do site, você encontrará a barra de navegação.</p>
                                        <p>Na barra de navegação, localize a opção "Cadastro" e clique nela. Isso o levará à página de cadastro do sistema.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <div class="card-header" id="headingTwo">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Como se cadastrar no sistema?<span class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>Preencha o Formulário de Cadastro</p>
                                        <p>Na página de cadastro, você verá um formulário que deve ser preenchido, Com as suas informações pessoais, seu nome, email, endereço e etc.</p>
                                        <p>Válido citar, você deverá já ter um RA para se cadastrar ao sistema de chaves!</p>
                                        <p>Antes de enviar o formulário, revise todas as informações para garantir que estejam corretas e completas.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 wow fadeInUp" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <div class="card-header" id="headingThree">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Envie o Formulário<span class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>Após preencher todos os campos e revisar as informações, clique no botão "Cadastrar usuário" para enviar o formulário.</p>
                                        <p>Se o seu formulario for enviado com exito vai aparecer a seguinte informação "Usuário cadastrado com sucesso".</p>
                                        <p>Se tiver aparecido a mensagem "Erro ao cadastrar o usuário", revise as informações que você inseriu no formulario e tente outra vez.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card border-0 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <div class="card-header" id="headingFour">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Por que não temos o "X"/"Twitter" nos contatos?<span class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>Depois de uma treta levinha entre Harry Potter e Voldemort no filme "Harry Potter e a Disputa dos Egos", o tal aplicativo sofreu um colapso, mas é possível que volte em breve e teremos o tal aplicativo nos contatos :D</p>
                                        <p>E ah, não use VPN, mesmo que seja quase impossível ser rastreado, fica aí a recomendação.</p>
                                        <p>E sim, o Bluesky é imundo.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 wow fadeInUp" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <div class="card-header" id="headingFive">
                                    <h6 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">O que fazer se eu perder a chave?<span class="lni-chevron-up"></span></h6>
                                </div>
                                <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#faqAccordion">
                                    <div class="card-body">
                                        <p>Caso você tenha perdido a chave vá até a parte superior do site, você encontrará a barra de navegação, e nele, clique na opção "Chaves". Após isso, selecione a opção desejada, nesse caso, "Perdi uma chave".</p>
                                        <p>Você será enviado para a tabela "Perdi chave", escolha a chave da sala que você perdeu e clique no botão "Perdi chave".</p>
                                        <p>Por fim você será redirecionado para um formulário, ele irá buscar os dados da chave selecionada, nesse caso você só irá selecionar um motivo que seja coerente a situação e um campo que você deverá especificar mais sobre o ocorrido.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Support Button-->
                        <div class="support-button text-center d-flex align-items-center justify-content-center mt-4 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <i class="lni-emoji-sad"></i>
                            <p class="mb-0 px-2">Não encontra suas respostas?</p>
                            <a href="https://github.com/bleeeeeq" target="_blank"> Nos contate!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
        include_once "Footer.php";  
    ?>

    <!-- SCRIPT -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- SCRIPT -->
</body>

</html>