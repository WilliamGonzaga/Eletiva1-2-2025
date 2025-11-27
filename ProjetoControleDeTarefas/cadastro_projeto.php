<?php
require 'cabecario.php';
require 'conexao.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');

    if ($nome === '') {
        $mensagem = '<div class="alert alert-danger">Informe o nome do projeto.</div>';
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO projeto (nome) VALUES (?)");
            $stmt->execute([$nome]);
            
            echo "<script>
                    alert('Projeto cadastrado com sucesso!');
                    window.location.href = 'listar_projeto.php';
                  </script>";
            exit;
        } catch (Exception $e) {
            $mensagem = '<div class="alert alert-danger">Erro ao cadastrar projeto: ' .
                        htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
}
?>

<h2 class="mb-4">Cadastro de Projeto</h2>

<?php if ($mensagem) echo $mensagem; ?>

<form method="post" class="row g-3">
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome do Projeto</label>
    <input type="text" name="nome" id="nome" class="form-control" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="listar_projeto.php" class="btn btn-secondary">Voltar</a>
  </div>
</form>

<?php
require 'rodape.php';
?> 
