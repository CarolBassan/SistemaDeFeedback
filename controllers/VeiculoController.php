<?php
require_once '../config/Conexao.php';
require_once '../models/Veiculo.php';

session_start();

$db = (new Database())->getConnection();
$veiculo = new Veiculo($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $veiculo->marca = $_POST['marca'];
    $veiculo->modelo = $_POST['modelo'];
    $veiculo->ano = $_POST['ano'];
    $veiculo->descricao = $_POST['descricao'];
    $veiculo->imagem = $_POST['imagem'];
    $veiculo->categoria = $_POST['categoria'];

    if ($veiculo->cadastrar()) {
        header("Location: ../views/sucesso.php");
    } else {
        echo "Erro ao cadastrar veículo.";
    }
}