<?php
include_once __DIR__ . '/Routes/ConfigRotas.php';
include 'View/header.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Veículos</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <main class="container">
        <div class="hero-container">
            <div class="hero-text">
                <h1 class="text-4xl" style="margin-bottom: 20px;">Sua Jornada Automotiva Começa Aqui</h1>
                <p class="text-lg" style="margin-bottom: 40px; color: var(--dark-gray); line-height: 1.6;">
                    Avaliações transparentes de donos reais.<br>
                    Compare modelos lado a lado.<br>
                    Encontre o veículo perfeito para você.
                </p>
                <a href="login" class="btn" style="width: 200px;">Acessar o Sistema</a>
            </div>
            <div class="car-container">
                <img src="carro.png" alt="Carro 2D" class="car-image">
            </div>
        </div>
    </main>
</body>

</html>

<?php
include 'View/footer.php';
?>