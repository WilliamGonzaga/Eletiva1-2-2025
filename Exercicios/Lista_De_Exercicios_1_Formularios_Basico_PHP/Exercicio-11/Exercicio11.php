<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">11 - Crie um formulário que permita ao usuário inserir o raio de um círculo. O script PHP deve calcular o perímetro do círculo (2πr) e exibir o resultado.</h3>

        <hr>

        <form method="post">
            <div class="mb-3">
                <div class="col-md-6">
                    <label for="raio" class="form-label">Raio do Círculo</label>
                    <input type="number" id="raio" name="raio" class="form-control" required="">
                </div>                
                
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Perimetro do círculo: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $raio = $_POST['raio'];
                    

                    
                    
                    $perimetro = (2 * 3.14 * $raio);
                    
                    echo $perimetro;
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
