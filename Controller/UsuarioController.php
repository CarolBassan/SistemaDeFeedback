<?php
require_once SRC . '/Config/Conexao.php';
require_once SRC . '/Model/Usuario.php';



session_start();

$db = Conexao::getConexao();
$usuario = new Usuario($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
        if ($_POST['senha'] !== $_POST['confirmar_senha']) {
            header("Location: ../views/cadusuario.php?erro=senhas_nao_conferem");
            exit();
        }

        // Verificar se email já existe
        $stmt = $db->prepare("SELECT id_user FROM usuario WHERE email = :email");
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            header("Location: ../views/cadusuario.php?erro=email_existente");
            exit();
        }

        // Verificar se CPF já existe
        $stmt = $db->prepare("SELECT id_user FROM usuario WHERE CPF = :CPF");
        $stmt->bindParam(':CPF', $_POST['CPF']);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            header("Location: ../views/cadusuario.php?erro=cpf_existente");
            exit();
        }

        $usuario->nome = $_POST['nome'];
        $usuario->CPF = $_POST['CPF'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];
        $usuario->tipo = 'comum';

        if ($usuario->cadastrar()) {
            header("Location:" . HOME . "/sucesso");
            exit();
        } else {
            header("Location: ../views/cadusuario.php?erro=erro_geral");
            exit();
        }
    } elseif (isset($_POST['acao']) && $_POST['acao'] === 'login') {
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        if ($usuario->login()) {
            header("Location: " . HOME . "/dashboard");
            exit();
        } else {
            echo "Login falhou.";
        }
    }
}
