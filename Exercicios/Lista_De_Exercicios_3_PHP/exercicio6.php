<?php
    include("cabecalho.php");
?>

<h3>6 - Crie um programa em PHP que recebe um número de ponto flutuante e retorna o número arredondado.</h3>

<hr>

    <form method="post">
        <div class="mb-3">
            <label for="numero" class="form-label">Digite um número de ponto flutuante:</label>
            <input type="number" step="any" class="form-control" id="numero" name="numero" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <div class="mb-3 mt-3">
        <?php
            function arredondarNumero($num) {
                return round($num);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero = $_POST["numero"];
                $numeroArredondado = arredondarNumero($numero);
                echo "<h4>O número arredondado de $numero é: $numeroArredondado</h4>";
            }
        ?>
    </div>


<?php
    include("rodape.php");
?>