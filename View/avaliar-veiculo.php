<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Avaliação de Veículos</title>
    <link rel="stylesheet" href="estilos.css" />
</head>

<body>
    <main class="container">
        <div class="vehicle-detail feedback-container">
            <div class="feedback-grid">
                <div class="review-form">
                    <h2>Avalie o veículo</h2>

                    <form class="feedback-form" method="post" action="processa_avaliacao.php">
                        <div class="form-group">
                            <label>Título da Avaliação</label>
                            <div class="input-wrapper">
                                <input type="text" id="titulo" name="titulo" placeholder=" " required />
                                <label class="input-placeholder">Digite um título para sua avaliação</label>
                                <span class="input-highlight"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Sua Avaliação (1-5 estrelas)</label>
                            <div class="star-rating horizontal">
                                <input type="radio" id="star5" name="rating" value="5" required />
                                <label for="star5" title="Excelente">★</label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="Muito Bom">★</label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="Bom">★</label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="Regular">★</label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="Ruim">★</label>
                            </div>
                            <div class="rating-labels horizontal">
                                <span>1 (Ruim)</span>
                                <span>5 (Excelente)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Opinião sobre o veículo</label>
                            <textarea id="comentario" name="comentario" class="feedback-textarea"
                                placeholder="Descreva sua experiência com o veículo..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Você recomenda este veículo?</label>
                            <div class="recommend-options">
                                <label>
                                    <input type="radio" name="recomendacao" value="sim" required /> Sim
                                </label>
                                <label>
                                    <input type="radio" name="recomendacao" value="nao" /> Não
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn">
                            Enviar Avaliação
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<?php
include 'footer.php';
?>