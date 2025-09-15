


<?php
    include("cabecalho.php");

?>
    <h3>2 - Escreva um programa para calcular a soma dos dois valores de entrada. Se
os dois valores forem iguais, retorne o triplo da soma.</h3>

<hr>

<form method="post">
    <div class="row inline-row mb-3">
        <div class="col-md-6">
            <label for="num1" class="form-label">Número 1:</label>
            <input type="number" id="num1" name="num1" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="num2" class="form-label">Número 2:</label>
            <input type="number" id="num2" name="num2" class="form-control" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<div class="mb-3 mt-3">

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];

            if ($num1 == $num2) {
                $soma = 3 * ($num1 + $num2);
            } else {
                $soma = $num1 + $num2;
            }

            echo "<p>Soma: $soma</p>";
        }

    ?>
    
</div>

<?php
    include("rodape.php");
?>