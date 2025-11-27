<?php
require 'cabecario.php';
require 'conexao.php';

$tarefas = [];
$erro = '';

try {
    $sql = "SELECT 
                t.id,
                t.nome,
                t.status,
                p.nome AS projeto,
                GROUP_CONCAT(m.nome SEPARATOR ', ') AS membros
            FROM tarefa t
            JOIN projeto p ON p.id = t.projeto_id
            LEFT JOIN tarefa_has_membro tm ON tm.tarefa_id = t.id
            LEFT JOIN membro m ON m.id = tm.membro_id
            GROUP BY t.id, t.nome, t.status, p.nome
            ORDER BY t.id DESC";
    $stmt = $pdo->query($sql);
    $tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $erro = 'Erro ao carregar tarefas: ' . htmlspecialchars($e->getMessage());
}
?>

<?php if (isset($_GET['msg']) && $_GET['msg']): ?>
  <div class="alert alert-info"><?php echo htmlspecialchars($_GET['msg']); ?></div>
<?php endif; ?>

<h2 class="mb-4">Lista de Tarefas</h2>

<?php if ($erro): ?>
  <div class="alert alert-danger"><?php echo $erro; ?></div>
<?php endif; ?>

<a href="cadastro_tarefa.php" class="btn btn-success mb-3">Nova Tarefa</a>

<table class="table table-striped table-hover">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Título</th>
      <th>Projeto</th>
      <th>Status</th>
      <th>Membros</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($tarefas)): ?>
      <tr>
        <td colspan="6" class="text-center">Nenhuma tarefa cadastrada.</td>
      </tr>
    <?php else: ?>
      <?php foreach ($tarefas as $t): ?>
        <tr>
          <td><?php echo $t['id']; ?></td>
          <td><?php echo htmlspecialchars($t['nome']); ?></td>
          <td><?php echo htmlspecialchars($t['projeto']); ?></td>
          <td><?php echo htmlspecialchars($t['status']); ?></td>
          <td><?php echo htmlspecialchars($t['membros'] ?? ''); ?></td>
          <td>
            <a href="editar_tarefa.php?id=<?php echo $t['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
            <a href="excluir_tarefa.php?id=<?php echo $t['id']; ?>" 
               class="btn btn-sm btn-danger"
               onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">
               Excluir
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>

<?php
require 'rodape.php';
?>
