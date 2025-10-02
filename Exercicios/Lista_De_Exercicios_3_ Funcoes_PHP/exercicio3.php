<?php
    include("cabecalho.php");
?>

<h3>3 - Crie um programa em PHP em que sejam lidas duas palavras, e verifique se a segunda palavra está contida na primeira. </h3>

<hr>

<form method="post">
    <div class="mb-3">
        <label for="palavra1" class="form-label">Digite a primeira palavra:</label>
        <input type="text" class="form-control" id="palavra1" name="palavra1" required>
    </div>
    <div class="mb-3">
        <label for="palavra2" class="form-label">Digite a segunda palavra:</label>
        <input type="text" class="form-control" id="palavra2" name="palavra2" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<div class="mb-3 mt-3">
    <?php

        function verificarContem($str1, $str2) {
            return strpos($str1, $str2) !== false;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $palavra1 = $_POST["palavra1"];
            $palavra2 = $_POST["palavra2"];
            if (verificarContem($palavra1, $palavra2)) {
                echo "<h4>A palavra '$palavra2' está contida na primeira palavra '$palavra1'.</h4>";
            } else {
                echo "<h4>A palavra '$palavra2' não está contida na primeira palavra '$palavra1'.</h4>";
            }
        }
    ?>
</div>

<?php
    include("rodape.php");
?>