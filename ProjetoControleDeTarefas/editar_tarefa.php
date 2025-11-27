<?php
require 'cabecario.php';
require 'conexao.php';

$id = $_GET['id'] ?? null;
$mensagem = '';

if (!$id) {
    echo '<div class="alert alert-danger">ID da tarefa não informado.</div>';
    require 'rodape.php';
    exit;
}

// Carrega tarefa
try {
    $stmt = $pdo->prepare("SELECT id, nome, status, projeto_id FROM tarefa WHERE id = ?");
    $stmt->execute([$id]);
    $tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$tarefa) {
        echo '<div class="alert alert-danger">Tarefa não encontrada.</div>';
        require 'rodape.php';
        exit;
    }
} catch (Exception $e) {
    echo '<div class="alert alert-danger">Erro ao carregar tarefa: ' .
         htmlspecialchars($e->getMessage()) . '</div>';
    require 'rodape.php';
    exit;
}

// Carrega projetos e membros
$projetos = [];
$membros  = [];
$selecionados = [];

try {
    $stmt = $pdo->query("SELECT id, nome FROM projeto ORDER BY nome");
    $projetos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->query("SELECT id, nome FROM membro ORDER BY nome");
    $membros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare("SELECT membro_id FROM tarefa_has_membro WHERE tarefa_id = ?");
    $stmt->execute([$id]);
    $selecionados = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (Exception $e) {
    $mensagem = '<div class="alert alert-danger">Erro ao carregar dados auxiliares: ' .
                htmlspecialchars($e->getMessage()) . '</div>';
}

$statuses = ['Pendente', 'Em Andamento', 'Concluido', 'Cancelado'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome       = trim($_POST['nome'] ?? '');
    $status     = $_POST['status'] ?? '';
    $projeto_id = $_POST['projeto_id'] ?? '';
    $membrosSel = $_POST['membros'] ?? [];

    if ($nome === '' || $status === '' || $projeto_id === '') {
        $mensagem = '<div class="alert alert-danger">Preencha todos os campos obrigatórios.</div>';
    } else {
        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare("UPDATE tarefa SET nome = ?, status = ?, projeto_id = ? WHERE id = ?");
            $stmt->execute([$nome, $status, $projeto_id, $id]);

            // Atualiza relacionamento tarefa x membros
            $stmt = $pdo->prepare("DELETE FROM tarefa_has_membro WHERE tarefa_id = ?");
            $stmt->execute([$id]);

            if (!empty($membrosSel)) {
                $stmtRel = $pdo->prepare(
                    "INSERT INTO tarefa_has_membro (tarefa_id, membro_id) VALUES (?, ?)"
                );
                foreach ($membrosSel as $membroId) {
                    $stmtRel->execute([$id, $membroId]);
                }
            }

            $pdo->commit();

            // ✅ Após atualizar, manda para a listagem
            header('Location: listar_tarefa.php');
            exit;
        } catch (Exception $e) {
            $pdo->rollBack();
            $mensagem = '<div class="alert alert-danger">Erro ao atualizar tarefa: ' .
                        htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}
?>

<h2 class="mb-4">Editar Tarefa</h2>

<?php if ($mensagem) echo $mensagem; ?>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label for="nome" class="form-label">Título da Tarefa</label>
    <input type="text" name="nome" id="nome" class="form-control"
           value="<?php echo htmlspecialchars($tarefa['nome']); ?>" required>
  </div>

  <div class="col-md-4">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-select" required>
      <option value="">Selecione...</option>
      <?php foreach ($statuses as $st): ?>
        <option value="<?php echo htmlspecialchars($st); ?>"
          <?php echo ($tarefa['status'] === $st) ? 'selected' : ''; ?>>
          <?php echo htmlspecialchars($st); ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-md-6">
    <label for="projeto_id" class="form-label">Projeto</label>
    <select name="projeto_id" id="projeto_id" class="form-select" required>
      <option value="">Selecione...</option>
      <?php foreach ($projetos as $proj): ?>
        <option value="<?php echo $proj['id']; ?>"
          <?php echo ($tarefa['projeto_id'] == $proj['id']) ? 'selected' : ''; ?>>
          <?php echo htmlspecialchars($proj['nome']); ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-md-6">
    <label for="membros" class="form-label">Membros Responsáveis</label>
    <select name="membros[]" id="membros" class="form-select" multiple>
      <?php foreach ($membros as $m): ?>
        <option value="<?php echo $m['id']; ?>"
          <?php echo in_array($m['id'], $selecionados) ? 'selected' : ''; ?>>
          <?php echo htmlspecialchars($m['nome']); ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar_tarefa.php" class="btn btn-secondary">Voltar</a>
  </div>
</form>

<?php
require 'rodape.php';
?>
