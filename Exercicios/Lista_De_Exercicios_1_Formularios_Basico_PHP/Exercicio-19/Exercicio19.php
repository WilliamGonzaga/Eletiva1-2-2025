<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">19 -  Crie um formulário que permita ao usuário inserir um valor em dias. O script PHP deve converter esse valor para horas, minutos e segundos e exibir o resultado. </h3>

        <hr>

        <form method="post">
            <div class="mb-3">
            <div class="col-md-6">
                    <label for="dias" class="form-label">Dias</label>
                    <input type="number" id="dias" name="dias" class="form-control" required="" step="any">
            </div>
            
           
                
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Resultado: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $dias = $_POST['dias'];

                    $horas = $dias * 24;
                    $minutos = $horas * 60;
                    $segundos = $minutos * 60;

                    echo "Horas: $horas, Minutos: $minutos, Segundos: $segundos";
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


