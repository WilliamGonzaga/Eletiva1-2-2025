<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio - 16</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h3 class="text-center">16 - Crie um formulário que permita ao usuário inserir um preço e um percentual de desconto. O script PHP deve calcular o preço com desconto e exibir o resultado. </h3>

        <hr>

        <form method="post">
            <div class="mb-3">
            <div class="col-md-6">
                    <label for="preco" class="form-label">Preço</label>
                    <input type="number" id="preco" name="preco" class="form-control" required="" step="any">
            </div>
            
            <div class="col-md-6">
                    <label for="desconto" class="form-label">Desconto (%)</label>
                    <input type="number" id="desconto" name="desconto" class="form-control" required step="any" >
            </div>
                
                
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>

            <div class="mb-3 mt-3">
                <label for="soma" class="form-label">Resultado preço com Desconto: </label>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $preco = $_POST['preco'];
                    $desconto = $_POST['desconto'];

                    $precoComDesconto = $preco - ($preco * ($desconto / 100));
                    echo "$precoComDesconto ";
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


