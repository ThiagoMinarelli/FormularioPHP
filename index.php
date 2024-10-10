<?php
require_once 'Funcionario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $funcionario = new Funcionario();
    
    $funcionario->setNomeCompleto($_POST['nomeCompleto']);
    $funcionario->setDataNascimento($_POST['dataNascimento']);
    $funcionario->setFuncao($_POST['funcao']);
    $funcionario->setTelefone($_POST['telefone']);
    $funcionario->setEmail($_POST['email']);
    $funcionario->setSalarioLiquido($_POST['salarioLiquido']);
    $funcionario->setSalarioBruto($_POST['salarioBruto']);

    $date = date('m/d', strtotime($funcionario->getDataNascimento()));
    $apiResponse = file_get_contents("http://numbersapi.com/{$date}");

    echo "<div style='text-align: center; margin-top: 50px;'>";
    echo "<h3>Dados do Funcionário:</h3>";
    echo "Nome Completo: " . $funcionario->getNomeCompleto() . "<br>";
    echo "Data de Nascimento: " . $funcionario->getDataNascimentoFormatada() . "<br>";
    echo "Função: " . $funcionario->getFuncao() . "<br>";
    echo "Telefone: " . $funcionario->getTelefone() . "<br>";
    echo "E-mail: " . $funcionario->getEmail() . "<br>";
    echo "Salário Bruto: " . $funcionario->getSalarioBruto() . "<br>";
    echo "Salário Líquido: " . $funcionario->getSalarioLiquido() . "<br>";
    echo "Desconto: " . $funcionario->calculaDesconto() . "<br>";
    echo "<p>Fato interessante sobre a data de nascimento: $apiResponse</p>";
    echo "</div>";
}

$corFundo = 'white'; // Cor padrão (tema claro)
if (isset($_COOKIE['corFundo'])) {
    $corFundo = $_COOKIE['corFundo'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: <?php echo $corFundo; ?>;
            color: <?php echo $corFundo === 'black' ? 'white' : 'black'; ?>;
        }
        .btn-theme-toggle {
            background-color: <?php echo $corFundo === 'black' ? 'white' : 'black'; ?>;
            color: <?php echo $corFundo === 'black' ? 'black' : 'white'; ?>;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Cadastro de Funcionário</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nomeCompleto" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" required>
            </div>
            <div class="mb-3">
                <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
            </div>
            <div class="mb-3">
                <label for="funcao" class="form-label">Função</label>
                <input type="text" class="form-control" id="funcao" name="funcao" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="salarioLiquido" class="form-label">Salário Líquido</label>
                <input type="number" class="form-control" id="salarioLiquido" name="salarioLiquido" required>
            </div>
            <div class="mb-3">
                <label for="salarioBruto" class="form-label">Salário Bruto</label>
                <input type="number" class="form-control" id="salarioBruto" name="salarioBruto" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

        <button class="btn btn-theme-toggle mt-3" onclick="alterarTema()">Mudar para Tema Escuro/Claro</button>
    </div>

    <script>
        function alterarTema() {
            let corAtual = document.body.style.backgroundColor;
            let novaCor = corAtual === 'black' ? 'white' : 'black';
            document.body.style.backgroundColor = novaCor;
            document.body.style.color = novaCor === 'black' ? 'white' : 'black';
            
            document.cookie = "corFundo=" + novaCor + "; path=/; max-age=" + 60*60*24*30; // Cookie expira em 30 dias
            
            let btn = document.querySelector('.btn-theme-toggle');
            btn.style.backgroundColor = novaCor === 'black' ? 'white' : 'black';
            btn.style.color = novaCor === 'black' ? 'black' : 'white';
        }
    </script>
</body>
</html>