<?php
require 'conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: listar_tarefa.php?msg=ID da tarefa não informado');
    exit;
}

try {
    // primeiro remove relacionamento com membros (se existir)
    $stmt = $pdo->prepare("DELETE FROM tarefa_has_membro WHERE tarefa_id = ?");
    $stmt->execute([$id]);

    // depois remove a tarefa
    $stmt = $pdo->prepare("DELETE FROM tarefa WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: listar_tarefa.php?msg=Tarefa excluída com sucesso');
    exit;
} catch (Exception $e) {
    $msg = urlencode('Erro ao excluir tarefa: ' . $e->getMessage());
    header('Location: listar_tarefa.php?msg=' . $msg);
    exit;
}
?>
