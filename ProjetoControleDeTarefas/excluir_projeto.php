<?php
require 'conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: listar_projeto.php?msg=ID do projeto não informado');
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM projeto WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: listar_projeto.php?msg=Projeto excluído com sucesso');
    exit;
} catch (Exception $e) {
    $msg = urlencode('Erro ao excluir projeto: ' . $e->getMessage());
    header('Location: listar_projeto.php?msg=' . $msg);
    exit;
}
?>
