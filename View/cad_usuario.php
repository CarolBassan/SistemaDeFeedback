<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form action="../Controller/UsuarioController.php" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>