<?php
require 'cabecario.php';
require 'conexao.php';

$membros = [];
$erro = '';

try {
    $stmt = $pdo->query("SELECT id, nome, email, telefone FROM membro ORDER BY id");
    $membros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $erro = 'Erro ao carregar membros: ' . htmlspecialchars($e->getMessage());
}
?>

<?php if (isset($_GET['msg']) && $_GET['msg']): ?>
  <div class="alert alert-info"><?php echo htmlspecialchars($_GET['msg']); ?></div>
<?php endif; ?>

<h2 class="mb-4">Lista de Membros</h2>

<?php if ($erro): ?>
  <div class="alert alert-danger"><?php echo $erro; ?></div>
<?php endif; ?>

<a href="cadastro_membro.php" class="btn btn-success mb-3">Novo Membro</a>

<table class="table table-striped table-hover">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>E-mail</th>
      <th>Telefone</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($membros)): ?>
      <tr>
        <td colspan="5" class="text-center">Nenhum membro cadastrado.</td>
      </tr>
    <?php else: ?>
      <?php foreach ($membros as $m): ?>
        <tr>
          <td><?php echo $m['id']; ?></td>
          <td><?php echo htmlspecialchars($m['nome']); ?></td>
          <td><?php echo htmlspecialchars($m['email']); ?></td>
          <td><?php echo htmlspecialchars($m['telefone']); ?></td>
          <td>
            <a href="editar_membro.php?id=<?php echo $m['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
            <a href="excluir_membro.php?id=<?php echo $m['id']; ?>" 
               class="btn btn-sm btn-danger"
               onclick="return confirm('Tem certeza que deseja excluir este membro?');">
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
