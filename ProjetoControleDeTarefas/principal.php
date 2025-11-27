<?php
require 'cabecario.php';
require 'conexao.php';

// Carregar tarefas com projeto e membros
try {
    $sql = "
        SELECT 
            t.id,
            t.nome AS tarefa_nome,
            t.status,
            p.nome AS projeto_nome
        FROM tarefa t
        INNER JOIN projeto p ON p.id = t.projeto_id
        ORDER BY t.id DESC
    ";

    $stmt = $pdo->query($sql);
    $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Buscar membros por tarefa
    $sqlM = $pdo->prepare("
        SELECT m.nome 
        FROM tarefa_has_membro th
        INNER JOIN membro m ON m.id = th.membro_id
        WHERE th.tarefa_id = ?
    ");
} catch (Exception $e) {
    echo '<div class="alert alert-danger">Erro ao carregar tarefas: ' .
         htmlspecialchars($e->getMessage()) . '</div>';
    require 'rodape.php';
    exit;
}
?>

<h2 class="mb-4">📋 Tarefas Existentes</h2>

<div class="table-responsive">
<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Tarefa</th>
            <th>Projeto</th>
            <th>Status</th>
            <th>Membros Responsáveis</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($tarefas)): ?>
            <tr>
                <td colspan="5" class="text-center text-muted">Nenhuma tarefa cadastrada.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($tarefas as $t): ?>

                <?php
                // Buscar membros da tarefa
                $sqlM->execute([$t['id']]);
                $membros = $sqlM->fetchAll(PDO::FETCH_COLUMN);

                // Cores do Badge de Status
                $badge = [
                    'Pendente'     => 'warning',
                    'Em Andamento' => 'primary',
                    'Concluido'    => 'success',
                    'Cancelado'    => 'secondary'
                ];
                ?>

                <tr>
                    <td><?php echo $t['id']; ?></td>
                    <td><?php echo htmlspecialchars($t['tarefa_nome']); ?></td>
                    <td><?php echo htmlspecialchars($t['projeto_nome']); ?></td>
                    <td>
                        <span class="badge bg-<?php echo $badge[$t['status']] ?? 'dark'; ?>">
                            <?php echo $t['status']; ?>
                        </span>
                    </td>
                    <td>
                        <?php 
                        if (empty($membros)) {
                            echo '<span class="text-muted">Nenhum</span>';
                        } else {
                            echo implode(', ', $membros);
                        }
                        ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>

<?php require 'rodape.php'; ?>
