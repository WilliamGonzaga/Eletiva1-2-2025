<?php
require 'conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: listar_membro.php?msg=ID do membro não informado');
    exit;
}

try {
    $stmt = $pdo->prepare("DELETE FROM membro WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: listar_membro.php?msg=Membro excluído com sucesso');
    exit;
} catch (Exception $e) {
    $msg = urlencode('Erro ao excluir membro: ' . $e->getMessage());
    header('Location: listar_membro.php?msg=' . $msg);
    exit;
}
?>
