<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - 18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">18 - Crie um formulário que permita ao usuário inserir um capital, uma taxa de juros e um período. O script PHP deve calcular o montante com juros compostos (capital * (1 + taxa) ^ período) e exibir o resultado</h3>

        <hr>

        <form method="post">
            <div class="mb-3">
            <div class="col-md-6">
                    <label for="capital" class="form-label">Capital</label>
                    <input type="number" id="capital" name="capital" class="form-control" required="" step="any">
            </div>
            
            <div class="col-md-6">
                    <label for="taxa" class="form-label">Taxa de Juros (%)</label>
                    <input type="number" id="taxa" name="taxa" class="form-control" required step="any" >
            </div>

            <div class="col-md-6">
                    <label for="periodo" class="form-label">Período (anos)</label>
                    <input type="number" id="periodo" name="periodo" class="form-control" required step="any" >
            </div>
                
                
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Resultado Montante: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $capital = $_POST['capital'];
                    $taxa = $_POST['taxa'];
                    $periodo = $_POST['periodo'];

                    $montante = ($capital * (1 + ($taxa / 100)) ** $periodo);
                    echo number_format($montante, 2, ',', '.');
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


