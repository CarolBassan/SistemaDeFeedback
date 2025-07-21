<?php
session_start();
if (isset($_SESSION['sessaoID'])) {
    header('location:home.php');
}
?>

<?php
include 'header.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback de Veículos</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Bem-vindo</h2>
            <p>Por favor, preencha os campos abaixo para acessar o sistema de avaliação e feedback de veículos</p>
        </div>

        <form method="POST" action="Controller/LoginController.php?function=login">
            <div class="form-group">
                <label for="email">Usuário</label>
                <div class="input-wrapper">
                    <input type="text" id="email" name="email" placeholder=" " required />
                    <span class="input-placeholder">Digite seu e-mail</span>
                    <div class="input-highlight"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <div class="input-wrapper">
                    <input type="password" id="senha" name="senha" placeholder=" " required />
                    <span class="input-placeholder">Digite sua senha</span>
                    <div class="input-highlight"></div>
                </div>
            </div>
            <button type="submit" class="btn" name="login_button">Entrar</button>
            <a href="cadastro-usuario" class="link">Cadastrar Usuário</a>
            <?php if (isset($_GET["erro"])): ?>
                <div class="error-message">
                    Usuário ou Senha Inválidos.
                </div>
            <?php endif; ?>
        </form>
    </div>
    </div>
    <script src="script.js"></script>
</body>

</html>

<?php
include 'footer.php';
?>