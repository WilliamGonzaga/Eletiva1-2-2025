<?php
    include("cabecalho.php");
?>

<h3>2 - Crie um programa em PHP em que seja lida uma palavra e ela seja apresentada com seus caracteres em maiúsculo e minúsculo. </h3>

<hr>

<form method="post">
    <div class="mb-3">
        <label for="palavra" class="form-label">Digite uma palavra:</label>
        <input type="text" class="form-control" id="palavra" name="palavra" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>

</form>

<div class="mb-3 mt-3">
    <?php

        function converterMaiusculoMinusculo($str) {
            $maiusculo = strtoupper($str);
            $minusculo = strtolower($str);
            return array($maiusculo, $minusculo);
        }       

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $palavra = $_POST["palavra"];
            list($maiusculo, $minusculo) = converterMaiusculoMinusculo($palavra);
            echo "<h4>A palavra '$palavra' em maiúsculo é: $maiusculo</h4>";
            echo "<h4>A palavra '$palavra' em minúsculo é: $minusculo</h4>";
        }
    ?>
</div>


<?php
    include("rodape.php");
?>