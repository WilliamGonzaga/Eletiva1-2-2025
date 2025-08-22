<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">5 - Criar um formulário que permita ao usuário inserir três notas. O script PHP deve calcular a média das notas e exibir o resultado.</h3>

        <hr>

        <form method="post">
            <div class="mb-3">
                <div class="col-md-6">
                    <label for="nota1" class="form-label">Primeiro Nota</label>
                    <input type="number" id="nota1" name="nota1" class="form-control" required="">
                </div>
                <div class="col-md-6">
                    <label for="nota2" class="form-label">Segundo Nota</label>
                    <input type="number" id="nota2" name="nota2" class="form-control" required="">
                </div>
                <div class="col-md-6">
                    <label for="nota3" class="form-label">Terceira Nota</label>
                    <input type="number" id="nota3" name="nota3" class="form-control" required="">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Resultado da Mdéia: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $nota1 = $_POST['nota1'];
                    $nota2 = $_POST['nota2'];
                    $nota3 = $_POST['nota3'];
                    
                    $media = ($nota1+$nota2+$nota3) / 3;

                    echo $media;
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
