<?php
include_once __DIR__ . '/Routes/ConfigRotas.php';
include 'View/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Sistema de Feedback de Veículos</title>


    <style>
        body {
            background: #f6f7fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            max-width: 500px;
            margin: 60px auto 0 auto;
            padding: 40px 30px 30px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        h1 {
            color: #2d3a4b;
            margin-bottom: 18px;
            font-weight: 700;
        }

        p {
            color: #4a5568;
            font-size: 17px;
            margin-bottom: 28px;
        }

        .btn {
            display: inline-block;
            background: #3bb77e;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px 28px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            margin: 8px 4px;
            transition: background 0.2s;
        }

        .btn:hover {
            background: #329e6b;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Sistema de Feedback de Veículos</h1>
        <p>
            Avalie veículos, compartilhe experiências e ajude outros usuários a escolherem o melhor modelo!<br>
            Cadastre-se, faça login e participe da nossa comunidade de avaliações automotivas.
        </p>
        <a href="login" class="btn">Entrar</a>
        <a href="cadastro-usuario" class="btn">Cadastrar-se</a>
        <a href="cadastro-veiculo" class="btn">Cadastrar Veículo</a>
    </div>
    <script src="script.js"></script>
</body>

<?php
include 'View/footer.php';
?>
</html>