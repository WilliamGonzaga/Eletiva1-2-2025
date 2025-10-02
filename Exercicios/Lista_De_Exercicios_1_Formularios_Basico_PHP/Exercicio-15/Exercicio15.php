<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">15 -  Crie um formulário que permita ao usuário inserir seu peso (em kg) e altura (em metros). O script PHP deve calcular o IMC (peso / altura²) e exibir o resultado. </h3>

        <hr>

        <form method="post">
            <div class="mb-3">
            <div class="col-md-6">
                    <label for="peso" class="form-label">Peso (kg)</label>
                    <input type="number" id="peso" name="peso" class="form-control" required="" step="any">
            </div>
            
            <div class="col-md-6">
                    <label for="altura" class="form-label">Altura (m)</label>
                    <input type="number" id="altura" name="altura" class="form-control" required step="any" >
            </div>
                
                
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Resultado IMC: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $peso = $_POST['peso'];
                    $altura = $_POST['altura'];
                    



                    $imc = ($peso / ($altura * $altura));
                     
                    echo "$imc ";
                }
                ?>      
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


