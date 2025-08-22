<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Primeiro exemplo de formulario</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <?php

    //nome = $_POST['nome'];
    //echo "Seja bem vindo(a) $nome";
    

    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];

    $soma = $numero1 + $numero2;

    echo "soma do numero 1: $numero1 + numero 2: $numero2 é: $soma";

    ?>

  </div>



  <a href="Formulario.php">Voltar</a>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"></script>
</body>

</html>