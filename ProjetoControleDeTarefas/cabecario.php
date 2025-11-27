<?php
session_start();
if (!isset($_SESSION['acesso'])) {
  header('Location: index.php');
  exit;
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Controle de Tarefas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="principal.php">Sistema de Controle de Tarefas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="principal.php">Início</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownCadastro" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Cadastro
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownCadastro">
              <li><a class="dropdown-item" href="cadastro_projeto.php">Cadastrar Projeto</a></li>
              <li><a class="dropdown-item" href="cadastro_tarefa.php">Cadastrar Tarefa</a></li>
              <li><a class="dropdown-item" href="cadastro_membro.php">Cadastrar Membro</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownListar" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Listar
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownListar">
              <li><a class="dropdown-item" href="listar_projeto.php">Projetos</a></li>
              <li><a class="dropdown-item" href="listar_tarefa.php">Tarefas</a></li>
              <li><a class="dropdown-item" href="listar_membro.php">Membros</a></li>
            </ul>
          </li>
        </ul>

        <div class="d-flex">
          <span class="navbar-text text-light me-3">
            Olá, <?php echo htmlspecialchars($_SESSION['nome'] ?? ''); ?>
          </span>
          <a href="logout.php" class="btn btn-outline-light btn-sm">Sair</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
