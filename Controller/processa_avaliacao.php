<?php
session_start();
require_once __DIR__ . '/../Config/Conexao.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['id_user'])) {
    die("Você precisa estar logado para enviar uma avaliação.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = Conexao::getConexao();

        // Dados do formulário
        $id_user = $_SESSION['id_user'];
        $id_veiculo = isset($_POST['id_veiculo']) ? (int) $_POST['id_veiculo'] : 0;
        $titulo = isset($_POST['titulo']) ? trim($_POST['titulo']) : '';
        $nota = isset($_POST['rating']) ? (int) $_POST['rating'] : 0;
        $opiniao = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';
        $recomendaria = isset($_POST['recomendacao']) ? $_POST['recomendacao'] : '';

        // Validações
        if (!$id_veiculo || !$titulo || !$nota || !$opiniao || !in_array($recomendaria, ['sim', 'nao'])) {
            throw new Exception("Preencha todos os campos corretamente.");
        }

        // Inserção no banco
        $stmt = $pdo->prepare("
            INSERT INTO avaliacao (id_user, id_veiculo, nota, titulo, txt_opiniao, recomendaria)
            VALUES (:id_user, :id_veiculo, :nota, :titulo, :opiniao, :recomendaria)
        ");

        $stmt->execute([
            ':id_user' => $id_user,
            ':id_veiculo' => $id_veiculo,
            ':nota' => $nota,
            ':titulo' => $titulo,
            ':opiniao' => $opiniao,
            ':recomendaria' => $recomendaria
        ]);

        // Redireciona para a página de detalhes (ou outra)
        header("Location: veiculo-detalhes.php?id=$id_veiculo&sucesso=1");
        exit;
    } catch (Exception $e) {
        echo "Erro ao salvar a avaliação: " . $e->getMessage();
    }
} else {
    echo "Requisição inválida.";
}
