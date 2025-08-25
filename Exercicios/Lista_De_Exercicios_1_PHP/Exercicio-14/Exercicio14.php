
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - 14</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">14 -   Crie um formulário que permita ao usuário inserir um valor em quilômetros. O script PHP deve converter esse valor para milhas (1 quilômetro = 0.621371 milhas) e exibir o resultado. </h3>

        <hr>

        <form method="post">
            <div class="mb-3">
            <div class="col-md-6">
                    <label for="quilômetros" class="form-label">Quilômetros</label>
                    <input type="number" id="quilômetros" name="quilômetros" class="form-control" required="">
                </div>
                
                
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Resultado valor em Milhas: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $quilômetros = $_POST['quilômetros'];
                    

                    
    
                    $milhas = ($quilômetros * 0.621371) ;
                    
                    echo "$milhas ";
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
