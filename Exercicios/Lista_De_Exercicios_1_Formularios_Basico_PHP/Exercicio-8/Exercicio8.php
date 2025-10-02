<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">8 - Crie um formulário que permita ao usuário inserir a largura e a altura de um retângulo. O script PHP deve calcular a área do retângulo e exibir o resultado.</h3>

        <hr>

        <form method="post">
            <div class="mb-3">
                <div class="col-md-6">
                    <label for="largura" class="form-label">Largura</label>
                    <input type="number" id="largura" name="largura" class="form-control" required="">
                </div>


                <div class="col-md-6">
                    <label for="altura" class="form-label">Altura</label>
                    <input type="number" id="altura" name="altura" class="form-control" required="">
                </div>

                
                
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Area Do Retamgulo: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $altura = $_POST['altura'];
                    $largura = $_POST['largura'];

                    
                    
                    $area = ($altura * $largura);
                    
                    echo $area;
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
