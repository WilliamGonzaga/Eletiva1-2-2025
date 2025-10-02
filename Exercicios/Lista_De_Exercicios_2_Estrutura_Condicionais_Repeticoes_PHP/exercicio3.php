
<?php
    include("cabecalho.php");
?>

<h3>3 - Faça um algoritmo PHP que receba os valores A e B, imprima-os em ordem
crescente em relação aos seus valores. Caso os valores sejam iguais,
informar o usuário e imprimir o valor em tela apenas uma vez.
Exemplo, para A=5, B=4 você deve imprimir na tela: "4 5".</h3>
<hr>

<form method="post">
    <div class="row inline-row mb-3">
        <div class="col-md-6">
            <label for="numA" class="form-label">Número A:</label>
            <input type="number" id="numA" name="numA" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="numB" class="form-label">Número B:</label>
            <input type="number" id="numB" name="numB" class="form-control" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<div class="mb-3 mt-3">

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numA = $_POST['numA'];
        $numB = $_POST['numB'];

        if ($numA == $numB) {
            echo "<p>Valores iguais: $numA</p>";
        } else {
            $menor = min($numA, $numB);
            $maior = max($numA, $numB);
            echo "<p>Ordem crescente: $menor $maior</p>";
        }
    }
    ?>
    
</div>


<?php

    include("rodape.php");
?>