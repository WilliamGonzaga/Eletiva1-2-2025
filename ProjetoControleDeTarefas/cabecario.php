<?php
session_start();
if (!isset($_SESSION['acesso']))
  header('Location: index.php');
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Controle de Tarefas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container"> 
      <a class="navbar-brand" href="principal.php">Sistema de Controle de Tarefas</a> 
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Alternar navegação"> 
        <span class="navbar-toggler-icon"></span> 
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item"> 
            <a class="nav-link" aria-current="page" href="principal.php">Início</a> 
          </li>

          <li class="nav-item dropdown"> 
            <a class="nav-link dropdown-toggle" href="#" id="dropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Cadastro </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown2">
              <li>
                <a class="dropdown-item" href="cadastro_projeto.php">Cadastrar Projeto</a>
              </li>
              <li>
                <a class="dropdown-item" href="cadastro_tarefa.php">Cadstrar Tarefa</a>
              </li>
              <li>
                <a class="dropdown-item" href="cadastro_membro.php">Cadstrar Membro</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container py-3"> 