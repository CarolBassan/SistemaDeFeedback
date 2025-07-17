<?php
include_once __DIR__ . '/Controller/VeiculoDAO.php';
include_once __DIR__ . '/Model/Veiculo.php';


$veiculoDao = new VeiculoDAO();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $veiculo = new Veiculo($veiculoDao->selectPorId($id)->fetch());
?>
    <!doctype html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <h2 class="center-align titulo corPadrao1">Edite o Veículo</h2>

        <div class="container">
            <div class="row card">
                <div class="col s1"></div>
                <div class="col s10">
                    <form action="Controller/VeiculoController.php?function=editar" method="post">
                        <input type="text" name="id" value="<?= $veiculo->getId() ?>" hidden>
                        <div class="input-field">
                            <input type="text" name="marca" id="marca" value="<?= $veiculo->getMarca() ?>">
                            <label for="marca">Marca</label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="modelo" id="modelo" value="<?= $veiculo->getModelo() ?>">
                            <label for="modelo">Modelo</label>
                        </div>
                        <div class="input-field">
                            <input type="text" name="anoFabricacao" id="anoFabricacao" value="<?= $veiculo->getAnoFabricacao() ?>" maxlength="4" onkeyup="onlyNumbers(this)">
                            <label for="anoFabricacao">Ano de Fabricação</label>
                        </div>
                        <div class="center">
                            <button class="btn btn-submit corPadrao1">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: index.php?toast=acessoNegado");
}
