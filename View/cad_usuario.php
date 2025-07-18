<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../View/estilos.css">
    <style>
        /* Ajustes para lembrar o visual do Home Tester Club */
        body {
            background: #f6f7fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            max-width: 400px;
            margin: 60px auto 0 auto;
            padding: 40px 30px 30px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #2d3a4b;
            text-align: center;
            margin-bottom: 28px;
            font-weight: 600;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #4a5568;
            font-size: 15px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: #f9fafb;
            font-size: 15px;
            transition: border 0.2s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border: 1.5px solid #3bb77e;
            outline: none;
            background: #fff;
        }

        button[type="submit"] {
            width: 100%;
            background: #3bb77e;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px 0;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background: #329e6b;
        }

        @media (max-width: 500px) {
            .container {
                padding: 25px 10px;
            }
        }
    </style>
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

</html>