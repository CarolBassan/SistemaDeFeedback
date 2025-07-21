<?php
require_once SRC . '/Config/Conexao.php';
include 'header.php';

try {
    $pdo = Conexao::getConexao();

    // Captura dos filtros
    $marca = isset($_GET['marca']) ? trim($_GET['marca']) : '';
    $modelo = isset($_GET['modelo']) ? trim($_GET['modelo']) : '';
    $categoria = isset($_GET['categoria']) ? trim($_GET['categoria']) : '';

    // Buscar valores únicos para os selects
    $marcas = $pdo->query("SELECT DISTINCT marca FROM veiculo ORDER BY marca")->fetchAll(PDO::FETCH_COLUMN);
    $modelos = $pdo->query("SELECT DISTINCT modelo FROM veiculo ORDER BY modelo")->fetchAll(PDO::FETCH_COLUMN);
    $categorias = $pdo->query("SELECT DISTINCT categoria FROM veiculo ORDER BY categoria")->fetchAll(PDO::FETCH_COLUMN);

    // Montagem da query com filtros
    $sql = "SELECT * FROM veiculo WHERE 1=1";
    $params = [];

    if (!empty($marca)) {
        $sql .= " AND marca = :marca";
        $params[':marca'] = $marca;
    }

    if (!empty($modelo)) {
        $sql .= " AND modelo = :modelo";
        $params[':modelo'] = $modelo;
    }

    if (!empty($categoria)) {
        $sql .= " AND categoria = :categoria";
        $params[':categoria'] = $categoria;
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Veículos Disponíveis</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>

    <div class="container">
        <h1 class="text-4xl">Veículos Disponíveis</h1>

        <!-- Container dos filtros -->
        <form method="GET" class="filtros-container">
            <select id="marca" name="marca">
                <option value="">Filtrar por Marca</option>
                <?php foreach ($marcas as $m): ?>
                    <option value="<?= htmlspecialchars($m) ?>" <?= $m === $marca ? 'selected' : '' ?>>
                        <?= htmlspecialchars($m) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select id="modelo" name="modelo">
                <option value="">Filtrar por Modelo</option>
                <?php foreach ($modelos as $mod): ?>
                    <option value="<?= htmlspecialchars($mod) ?>" <?= $mod === $modelo ? 'selected' : '' ?>>
                        <?= htmlspecialchars($mod) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <select id="categoria" name="categoria">
                <option value="">Filtrar por Categoria</option>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?= htmlspecialchars($cat) ?>" <?= $cat === $categoria ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn">Aplicar Filtros</button>
        </form>

        <!-- Lista de Veículos -->
        <div class="vehicle-list">
            <?php if (empty($veiculos)): ?>
                <p>Nenhum veículo encontrado com os filtros informados.</p>
            <?php else: ?>
                <?php foreach ($veiculos as $v): ?>
                    <div class="vehicle-card">
                        <img src="<?= htmlspecialchars($v['url_img'] ?: 'imagens/veiculo-padrao.jpg') ?>" alt="Imagem do veículo">
                        <div class="vehicle-info">
                            <h3><?= htmlspecialchars($v['marca'] . ' ' . $v['modelo']) ?></h3>
                            <p><strong>Categoria:</strong> <?= htmlspecialchars($v['categoria']) ?></p>
                            <p><strong>Cor:</strong> <?= htmlspecialchars($v['cor']) ?></p>
                            <p><strong>Ano:</strong> <?= htmlspecialchars($v['ano']) ?></p>
                            <p class="text-sm"><?= nl2br(htmlspecialchars($v['descricao'])) ?></p>
                            <a href="avaliar-veiculo.php?id=<?= $v['id_veiculo'] ?>" class="link">Avaliar este veículo</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>

<?php include 'footer.php'; ?>
