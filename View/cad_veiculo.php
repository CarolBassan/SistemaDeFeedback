<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Veículos</title>

    <script>
        function onlyNumbers(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Cadastre Um Veículo</h2>
        <form method="post" action="../Controller/VeiculoController.php">
            <input type="hidden" name="acao" value="cadastrar">
            <div class="input-field">
                <label for="marca">Marca</label>
                <input type="text" name="marca" id="marca" autocomplete="off" required>
            </div>
            <div class="input-field">
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" id="modelo" autocomplete="off" required>
            </div>
            <div class="input-field">
                <label for="anofabricacao">Ano de Fabricação</label>
                <input type="text" name="anoFabricacao" id="anofabricacao" autocomplete="off" required onkeyup="onlyNumbers(this)" maxlength="4" pattern="\d{4}" title="Digite um ano válido com 4 dígitos">
            </div>
            <div class="center">
                <button class="btn" type="submit">Cadastrar</button>
            </div>
        </form>
        <div class="center">
            <a href="index.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>

</html>