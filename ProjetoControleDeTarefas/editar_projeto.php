<?php
require 'cabecario.php';
require 'conexao.php';

$id = $_GET['id'] ?? null;
$mensagem = '';
$projeto = null;

if (!$id) {
    echo '<div class="alert alert-danger">ID de projeto não informado.</div>';
    require 'rodape.php';
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT id, nome FROM projeto WHERE id = ?");
    $stmt->execute([$id]);
    $projeto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$projeto) {
        echo '<div class="alert alert-danger">Projeto não encontrado.</div>';
        require 'rodape.php';
        exit;
    }
} catch (Exception $e) {
    echo '<div class="alert alert-danger">Erro ao carregar projeto: ' .
         htmlspecialchars($e->getMessage()) . '</div>';
    require 'rodape.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');

    if ($nome === '') {
        $mensagem = '<div class="alert alert-danger">O nome não pode ficar em branco.</div>';
    } else {
        try {
            $stmt = $pdo->prepare("UPDATE projeto SET nome = ? WHERE id = ?");
            $stmt->execute([$nome, $id]);
            $projeto['nome'] = $nome;

            // 🚀 REDIRECIONA PARA LISTAGEM DE PROJETOS APÓS EDITAR
            header('Location: listar_projeto.php');
            exit;
        } catch (Exception $e) {
            $mensagem = '<div class="alert alert-danger">Erro ao atualizar projeto: ' .
                        htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}
?>

<h2 class="mb-4">Editar Projeto</h2>

<?php if ($mensagem) echo $mensagem; ?>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome do Projeto</label>
    <input type="text" name="nome" id="nome" class="form-control"
           value="<?php echo htmlspecialchars($projeto['nome']); ?>" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar_projeto.php" class="btn btn-secondary">Voltar</a>
  </div>
</form>

<?php
require 'rodape.php';
?>
