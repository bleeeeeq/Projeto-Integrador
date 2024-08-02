<?php
    session_start();
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
    <link rel="shortcut icon" href="../IMG/Utilitários/Logo.png" type="image/x-icon">

    <title>Senac Chaves</title>
</head>

<body>
    <!-- Icon -->
    <nav class="navbar navbar-light" style="background-color: #ffffff;">
        <a class="navbar-brand" href="#">
            <img src="../IMG/Utilitários/LogoCaC.png" width=150 height="30" class="d-inline-block align-top" alt="">

        </a>
    </nav>
    <!-- Icon -->

    <!-- Home -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffb509;">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home<span class="sr-only">(Página atual)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Atualizações</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="cadUsuario.php">Cadastro</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Chaves
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Verificar chaves</a>
                        <a class="dropdown-item" href="#">Realizar agendamento</a>
                        <a class="dropdown-item" href="#">Perdi minha chave</a>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
    <!-- Home -->

    <!-- Cadastro -->
    <h1 style="text-align: center; margin-top: 55px;">CADASTRO</h1>
    <form class="cadastro" action="../PHP/cadastroUsuario.php" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do usuário" >
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required >
            </div>

            <div class="form-group col-md-2">
                <label for="inputPassword4">Senha</label>
                <input type="password" name="senha" class="form-control" id="inputPassword4" placeholder="Senha" required >
            </div>

            <div class="form-group col-md-4">
                <label for="inputRA">RA</label>
                <input type="text" name="ra" class="form-control" id="inputRA" oninput="mascaraRA(this)" maxlength="6" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputAddress">Endereço</label>
            <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0" required >
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Cidade</label>
                <input type="text" name="cidade" class="form-control" id="inputCity"  required>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <select id="idEstado" name="estado" class="form-control" name="estado" required>
                </select>
            </div>

            <div class="form-group col-md-2">
                <label for="inputCEP">CEP</label>
                <input type="text" name="cep" class="form-control" id="inputCEP" oninput="mascaraCEP(this)" maxlength="9" required>
            </div>

            <div class="form-group">
                <label for="inputCPF">CPF</label>
                <input type="text" name="cpf" class="form-control" id="inputCPF" size="27" oninput="mascaraCPF(this)" maxlength="14" required>
            </div>
        </div>
        </div>

        <button type="submit" name="btnCad" class="btn btn-primary">Cadastrar usuário</button>
    </form>
    <!-- Cadastro -->

    <!-- Footer -->
	<footer class="Footer" style="background-color: #ffb509;">		
		<section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom" style="background-color: #ffffff;"></section>		
        
		<!-- Section: Links  -->
		<section class="" >
			<div class="container text-center text-md-start mt-5" >
				<!-- Grid row -->
				<div class="row mt-3">
					<!-- Grid column -->
					<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
						<!-- Content -->
						<h6 class="text-uppercase fw-bold mb-4">
							<i class="fas fa-gem me-3"></i>
							Senac Chaves
						</h6>
						<p>
							Aqui está o sistema que gerencia e organiza as chaves do Senac!
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" >
						<!-- Participantes -->
						<h6 class="text-uppercase fw-bold mb-4">
							Participantes
						</h6>

						<p>
							<a href="https://github.com/bleeeeeq" class="text-reset">Gabriel M. Campos</a>
						</p>

						<p>
							<a href="https://github.com/igorAp13" class="text-reset">Igor C#</a>
						</p>

						<p>
							<a href="https://github.com/LucinaCarmo" class="text-reset">Lucina G. do Carmo</a>
						</p>

						<p>
							<a href="https://github.com/Tarcisio1234" class="text-reset">Tarcísio Alves</a>
						</p>
						
                  <!-- Participantes -->
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold mb-4">Contato</h6>

						<p><img src="../IMG/Icons/casa.png"></i> Juiz de Fora, Minas Gerais, BR</p>

						<p>
							<img src="../IMG/Icons/email.png"></i>
							Nozama@gmail.com
						</p>

						<p><img src="../IMG/Icons/telefone.png"></i> + 55 32 98807-8962</p>

					</div>
					<!-- Grid column -->
				</div>
				<!-- Grid row -->
			</div>
		</section>
		<!-- Section: Links  -->

		<!-- Copyright -->
		<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
			© 2024 Copyright:
			<a class="text-reset fw-bold" href="https://www.youtube.com/channel/UCtrjFP7i92_30uv6IehwE5Q">Cadê a chave?</a>
		</div>
		<!-- Copyright -->
	</footer>
	<!-- Footer -->

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
        </script>

    <!-- API Estados -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectElement = document.getElementById('idEstado');

            // API que retorna os estados do Brasil
            const apiUrl = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    data.sort((a, b) => a.nome.localeCompare(b.nome)); // Ordena os estados por nome
                    data.forEach(state => {
                        const option = document.createElement('option');
                        option.value = state.sigla;
                        option.textContent = state.nome;
                        selectElement.appendChild(option);
                    });
                })
                .catch(error => console.error('Erro ao carregar os estados:', error));
        });
    </script>

    <script>
        // Máscaras
        function mascaraCPF(cpf){
            cpf.value = cpf.value.replace(/\D/g,"")
            .replace(/(\d{3})(\d)/, "$1.$2")
            .replace(/(\d{3})(\d)/, "$1.$2")
            .replace(/(\d{3})(\d{1,2})$/,"$1-$2");
        }

        function mascaraCEP(cep){
            cep.value = cep.value.replace(/\D/g,"")
            .replace(/(\d{5})(\d{1,3})$/,"$1-$2");
        }
        function mascaraRA(ra){
            ra.value = ra.value.replace(/\D/g,"");
        }
    </script>
</body>
</html>