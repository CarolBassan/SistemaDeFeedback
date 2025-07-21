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
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Criar Conta</h2>
            <p>Preencha os campos abaixo para se cadastrar no sistema de avaliação e feedback de veículos</p>
        </div>

        <form method="POST" action="Controller/UsuarioController.php?function=cadastrar">
            <div class="form-group">
                <label for="nome">Nome Completo</label>
                <div class="input-wrapper">
                    <input type="text" id="nome" name="nome" placeholder=" " required />
                    <span class="input-placeholder">Digite seu nome completo</span>
                    <div class="input-highlight"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" placeholder=" " required />
                    <span class="input-placeholder">Digite seu e-mail</span>
                    <div class="input-highlight"></div>
                </div>
            </div>


            <div class="form-group">
                <label for="CPF">CPF</label>
                <div class="input-wrapper">
                    <input type="text" id="CPF" name="CPF" placeholder=" " required />
                    <span class="input-placeholder">Digite seu CPF</span>
                    <div class="input-highlight"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <div class="input-wrapper">
                    <input type="password" id="senha" name="senha" placeholder=" " required />
                    <span class="input-placeholder">Crie uma senha</span>
                    <div class="input-highlight"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="confirmar_senha">Confirmar Senha</label>
                <div class="input-wrapper">
                    <input type="password" id="confirmar_senha" name="confirmar_senha" placeholder=" " required />
                    <span class="input-placeholder">Repita a senha</span>
                    <div class="input-highlight"></div>
                </div>
            </div>

            <button type="submit" class="btn" name="cadastrar_button">Cadastrar</button>
            <a href="login" class="link">Já tem uma conta? Faça login</a>

            <?php if (isset($_GET["erro"])): ?>
                <div class="error-message">
                    <?php
                    switch ($_GET["erro"]) {
                        case "senhas_nao_conferem":
                            echo "As senhas não coincidem.";
                            break;
                        case "email_existente":
                            echo "Este e-mail já está cadastrado.";
                            break;
                        default:
                            echo "Ocorreu um erro ao cadastrar. Tente novamente.";
                    }
                    ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
    <script src="script.js"></script>
</body>

</html>

<?php
include 'footer.php';
?>