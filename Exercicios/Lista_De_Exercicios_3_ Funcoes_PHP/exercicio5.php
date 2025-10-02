<?php
    include("cabecalho.php");
?>

<h3>5 - Crie um programa em PHP que leia um valor e retorna a raiz quadrada desse número. </h3>

<hr>

<form method="post">
    <div class="mb-3">
        <label for="numero" class="form-label">Digite um número:</label>
        <input type="number" step="any" class="form-control" id="numero" name="numero" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<div class="mb-3 mt-3">
    <?php
        function calcularRaizQuadrada($num) {
            return $num ** 0.5;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = $_POST["numero"];
            $raizQuadrada = calcularRaizQuadrada($numero);
            echo "<h4>A raiz quadrada de $numero é: $raizQuadrada</h4>";
        }
    ?>
</div>

<?php
    include("rodape.php");
?>