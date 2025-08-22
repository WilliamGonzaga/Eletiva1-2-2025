<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">2 - Criar um formulário que permita ao usuário inserir dois números. O script PHP deve subtrair o segundo número do primeiro e exibir o resultado.</h3>

        <hr>

        <form method="post">
            <div class="row inline-row mb-3">
                <div class="col-md-6">
                    <label for="numero" class="form-label">Primeiro Número</label>
                    <input type="number" id="numero1" name="numero1" class="form-control" required="">
                </div>
                <div class="col-md-6">
                    <label for="numero2" class="form-label">Segundo Número</label>
                    <input type="number" id="numero2" name="numero2" class="form-control" required="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Resultado da Subtração: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $numero1 = $_POST['numero1'];
                    $numero2 = $_POST['numero2'];
                    echo $numero1 - $numero2;
                }
                ?>

            </div>


        </form>



        <footer>
            <a href="../../index.php">Voltar</a>
        </footer>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>