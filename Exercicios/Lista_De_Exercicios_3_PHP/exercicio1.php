<?php
    include("cabecalho.php");
?>

<h3>1 - Crie um programa em PHP em que seja lida uma palavra e apresentado o número de caracteres dessa palavra. </h3>

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

        function contarCaracteres($str) {
            return strlen($str);
        }       

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $palavra = $_POST["palavra"];
            $tamanho = contarCaracteres($palavra);
            echo "<h4>A palavra '$palavra' tem $tamanho caracteres.</h4>";
        }
    ?>
</div>


<?php
    include("rodape.php");
?>