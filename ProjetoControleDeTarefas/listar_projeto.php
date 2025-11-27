<?php
require 'cabecario.php';
require 'conexao.php';

$projetos = [];
$erro = '';

try {
    $stmt = $pdo->query("SELECT id, nome FROM projeto ORDER BY id");
    $projetos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $erro = 'Erro ao carregar projetos: ' . htmlspecialchars($e->getMessage());
}
?>

<?php if (isset($_GET['msg']) && $_GET['msg']): ?>
  <div class="alert alert-info"><?php echo htmlspecialchars($_GET['msg']); ?></div>
<?php endif; ?>

<h2 class="mb-4">Lista de Projetos</h2>

<?php if ($erro): ?>
  <div class="alert alert-danger"><?php echo $erro; ?></div>
<?php endif; ?>

<a href="cadastro_projeto.php" class="btn btn-success mb-3">Novo Projeto</a>

<table class="table table-striped table-hover">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($projetos)): ?>
      <tr>
        <td colspan="3" class="text-center">Nenhum projeto cadastrado.</td>
      </tr>
    <?php else: ?>
      <?php foreach ($projetos as $proj): ?>
        <tr>
          <td><?php echo $proj['id']; ?></td>
          <td><?php echo htmlspecialchars($proj['nome']); ?></td>
          <td>
            <a href="editar_projeto.php?id=<?php echo $proj['id']; ?>" class="btn btn-sm btn-primary">Editar</a>
            <a href="excluir_projeto.php?id=<?php echo $proj['id']; ?>" 
               class="btn btn-sm btn-danger"
               onclick="return confirm('Tem certeza que deseja excluir este projeto?');">
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
