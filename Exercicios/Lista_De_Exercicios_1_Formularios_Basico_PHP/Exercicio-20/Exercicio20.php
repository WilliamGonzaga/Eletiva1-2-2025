<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - 20</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">20 - Crie um formulário que permita ao usuário inserir uma distância e um tempo. O script PHP deve calcular a velocidade média (distância / tempo) e exibir o resultado.</h3>

        <hr>

        <form method="post">
            <div class="mb-3">
            <div class="col-md-6">
                    <label for="distancia" class="form-label">Distância (km)</label>
                    <input type="number" id="distancia" name="distancia" class="form-control" required="" step="any">
            </div>

            <div class="col-md-6">
                    <label for="tempo" class="form-label">Tempo (horas)</label>
                    <input type="number" id="tempo" name="tempo" class="form-control" required="" step="any">
            </div>

            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Resultado: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $distancia = $_POST['distancia'];
                    $tempo = $_POST['tempo'];

                    $velocidade = $distancia / $tempo;

                    echo "Velocidade Média: " . number_format($velocidade, 2, ',', '.') . " km/h";
                }
                ?>      
        </form>

        <footer>
            <a href="../../index.php">Voltar</a> 
        </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>
</html>


