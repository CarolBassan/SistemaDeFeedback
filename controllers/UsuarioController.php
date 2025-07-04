<?php
require_once '../config/Conexao.php';
require_once '../models/Usuario.php';

session_start();

$db = (new Database())->getConnection();
$usuario = new Usuario($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
        $usuario->nome = $_POST['nome'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];
        $usuario->perfil = $_POST['perfil'];

        if ($usuario->cadastrar()) {
            header("Location: ../views/sucesso.php");
        } else {
            echo "Erro ao cadastrar.";
        }
    } elseif (isset($_POST['acao']) && $_POST['acao'] === 'login') {
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        if ($usuario->login()) {
            header("Location: ../views/dashboard.php");
        } else {
            echo "Login falhou.";
        }
    }
}