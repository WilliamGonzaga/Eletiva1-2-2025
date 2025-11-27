<?php
require 'cabecario.php';
require 'conexao.php';

$id = $_GET['id'] ?? null;
$mensagem = '';
$membro = null;

if (!$id) {
    echo '<div class="alert alert-danger">ID de membro não informado.</div>';
    require 'rodape.php';
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT id, nome, email, telefone FROM membro WHERE id = ?");
    $stmt->execute([$id]);
    $membro = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$membro) {
        echo '<div class="alert alert-danger">Membro não encontrado.</div>';
        require 'rodape.php';
        exit;
    }
} catch (Exception $e) {
    echo '<div class="alert alert-danger">Erro ao carregar membro: ' .
         htmlspecialchars($e->getMessage()) . '</div>';
    require 'rodape.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if ($nome === '' || $email === '' || $telefone === '') {
        $mensagem = '<div class="alert alert-danger">Preencha todos os campos.</div>';
    } else {
        try {
            $stmt = $pdo->prepare("UPDATE membro SET nome = ?, email = ?, telefone = ? WHERE id = ?");
            $stmt->execute([$nome, $email, $telefone, $id]);

            // 🔹 Após atualizar, redireciona para a listagem
            header('Location: listar_membro.php?msg=Membro atualizado com sucesso!');
            exit;
        } catch (Exception $e) {
            $mensagem = '<div class="alert alert-danger">Erro ao atualizar membro: ' .
                        htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}
?>

<h2 class="mb-4">Editar Membro</h2>

<?php if ($mensagem) echo $mensagem; ?>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" id="nome" class="form-control"
           value="<?php echo htmlspecialchars($membro['nome']); ?>" required>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" name="email" id="email" class="form-control"
           value="<?php echo htmlspecialchars($membro['email']); ?>" required>
  </div>
  <div class="col-md-4">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" name="telefone" id="telefone" class="form-control"
           value="<?php echo htmlspecialchars($membro['telefone']); ?>" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar_membro.php" class="btn btn-secondary">Voltar</a>
  </div>
</form>

<?php
require 'rodape.php';
?>
