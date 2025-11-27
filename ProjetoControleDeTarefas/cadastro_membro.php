<?php
require 'cabecario.php';
require 'conexao.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if ($nome === '' || $email === '' || $telefone === '') {
        $mensagem = '<div class="alert alert-danger">Preencha todos os campos.</div>';
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO membro (nome, email, telefone) VALUES (?, ?, ?)");
            $stmt->execute([$nome, $email, $telefone]);

            // REDIRECIONA DIRETO PARA LISTAGEM
            header("Location: listar_membro.php");
            exit;

        } catch (Exception $e) {
            $mensagem = '<div class="alert alert-danger">Erro ao cadastrar membro: ' .
                        htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}

?>

<h2 class="mb-4">Cadastro de Membro</h2>

<?php if ($mensagem) echo $mensagem; ?>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" id="nome" class="form-control" required>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" name="email" id="email" class="form-control" required>
  </div>
  <div class="col-md-4">
    <label for="telefone" class="form-label">Telefone</label>
    <input type="text" name="telefone" id="telefone" class="form-control" placeholder="(xx) xxxxx-xxxx" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar_membro.php" class="btn btn-secondary">Voltar</a>
  </div>
</form>

<?php
require 'rodape.php';
?>
