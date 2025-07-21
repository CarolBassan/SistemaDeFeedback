<?php
include 'header.php';
$avaliacoes = [
    [
        'nome' => 'João Silva',
        'rating' => 5,
        'comentario' => 'Excelente veículo, muito confortável e econômico.',
        'data' => '2023-10-15',
        'recomenda' => true
    ],
    [
        'nome' => 'Maria Souza',
        'rating' => 4,
        'comentario' => 'Bom carro, mas o porta-malas é pequeno.',
        'data' => '2023-09-28',
        'recomenda' => true
    ]
];

// Cálculos estatísticos
$total_avaliacoes = count($avaliacoes);
$soma_ratings = array_sum(array_column($avaliacoes, 'rating'));
$media_ratings = $total_avaliacoes > 0 ? $soma_ratings / $total_avaliacoes : 0;

// Contagem por estrela
$contagem_estrelas = array_fill(1, 5, 0);
foreach ($avaliacoes as $avaliacao) {
    $contagem_estrelas[$avaliacao['rating']]++;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Pré-Feedback de Avaliações</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <main class="container">
        <div class="feedback-container">
            <div class="rating-summary">
                <div class="overall-rating">
                    <div class="average-rating"><?= number_format($media_ratings, 1) ?></div>
                    <div class="stars">
                        <?= str_repeat('★', round($media_ratings)) ?><?= str_repeat('☆', 5 - round($media_ratings)) ?>
                    </div>
                    <div class="total-ratings"><?= $total_avaliacoes ?> avaliações</div>
                </div>

                <div class="rating-details">
                    <?php for ($i = 5; $i >= 1; $i--): ?>
                    <div class="rating-bar">
                        <span class="stars"><?= str_repeat('★', $i) ?></span>
                        <div class="progress-container">
                            <div class="progress-bar"
                                style="width: <?= $total_avaliacoes > 0 ? ($contagem_estrelas[$i] / $total_avaliacoes) * 100 : 0 ?>%">
                            </div>
                        </div>
                        <span
                            class="percentage"><?= $total_avaliacoes > 0 ? round(($contagem_estrelas[$i] / $total_avaliacoes) * 100) : 0 ?>%</span>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div>
                <a href="avaliacao.php?id=<?= $veiculo_id ?? 0 ?>" class="btn">Avaliar este veículo</a>
            </div>

            <div class="reviews-list">
                <?php if ($total_avaliacoes > 0): ?>
                <?php foreach ($avaliacoes as $avaliacao): ?>
                <div class="review-card">
                    <div class="review-header">
                        <div class="review-author"><?= $avaliacao['nome'] ?></div>
                        <div class="review-rating">
                            <?= str_repeat('★', $avaliacao['rating']) ?><?= str_repeat('☆', 5 - $avaliacao['rating']) ?>
                        </div>
                        <div class="review-date"><?= date('d/m/Y', strtotime($avaliacao['data'])) ?></div>
                    </div>
                    <div class="review-content">
                        <p><?= $avaliacao['comentario'] ?></p>
                    </div>
                    <div class="review-recommend <?= $avaliacao['recomenda'] ? 'recommended' : 'not-recommended' ?>">
                        <?= $avaliacao['recomenda'] ? '✔ Recomenda este veículo' : '✖ Não recomenda este veículo' ?>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <p class="no-reviews">Este veículo ainda não possui avaliações.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>

</html>

<?php
include 'footer.php';
?>