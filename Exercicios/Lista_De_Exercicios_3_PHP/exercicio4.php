<?php
    include("cabecalho.php");
?>

<h3>4 - Crie um programa em PHP que leia três valores: dia, mês e ano. Verifique se a data informada é válida e apresente a data em formato dd/mm/YYYY. </h3>

<hr>

<form method="post">    
    <div class="mb-3">
        <label for="dia" class="form-label">Dia:</label>
        <input type="number" class="form-control" id="dia" name="dia" min="1" max="31" required>
    </div>
    <div class="mb-3">
        <label for="mes" class="form-label">Mês:</label>
        <input type="number" class="form-control" id="mes" name="mes" min="1" max="12" required>
    </div>
    <div class="mb-3">
        <label for="ano" class="form-label">Ano:</label>
        <input type="number" class="form-control" id="ano" name="ano" min="1" max="9999" required>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<div class="mb-3 mt-3">
    <?php

        function verificarDataValida($dia, $mes, $ano) {
            return checkdate($mes, $dia, $ano);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dia = $_POST["dia"];
            $mes = $_POST["mes"];
            $ano = $_POST["ano"];

            if (verificarDataValida($dia, $mes, $ano)) {
                $diaFormatado = sprintf("%02d", $dia);
                $mesFormatado = sprintf("%02d", $mes);
                $anoFormatado = sprintf("%04d", $ano);
                echo "<h4>A data informada é válida: $diaFormatado/$mesFormatado/$anoFormatado</h4>";
            } else {
                echo "<h4>A data informada é inválida.</h4>";
            }
        }
    ?>
</div>

<?php
    include("rodape.php");
?>