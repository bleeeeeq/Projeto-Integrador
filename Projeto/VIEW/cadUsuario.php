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
    <link rel="stylesheet" href="../CSS/cadastro.css">
    <link rel="shortcut icon" href="../IMG/Utilitários/Logo.png" type="image/x-icon">

    <title>Senac Chaves</title>
</head>

<body>

    <!-- Header -->
    <?php
        include_once "Header.php";
    ?>
    <!-- Header -->


    <!-- Cadastro -->
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
            <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Bairro Doidos, Rua dos Bobos, nº 0" required >
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Cidade</label>
                <input type="text" name="cidade" class="form-control" id="inputCity" placeholder="Cidade dos malucos" required>
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
                <input type="text" name="cpf" class="form-control" id="inputCPF" size="28" oninput="mascaraCPF(this)" maxlength="14" required>
            </div>

            <div class="gerencia">
                <label class="gerenciaL" for="inputgerencia"> Permissão para o gerenciar chaves:</label>
                <input type="checkbox" name="gerente" class="checkbox" id="inputgerencia" value ="1" >
            </div>
        </div>
        </div>

        <button type="submit" name="btnCad" class="btn btn-primary">Cadastrar usuário</button>
    </form>
    <!-- Cadastro -->

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
    <!-- Footer -->
    <?php
        include_once "Footer.php";
    ?>
    <!-- Footer -->
</body>
</html>