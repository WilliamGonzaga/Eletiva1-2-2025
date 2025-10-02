

<?php
    include("cabecalho.php");
?>

<h3>8 - Crie um formulário para que o usuário informe um número. Use um loop
do-while para exibir uma contagem regressiva a partir do número
informado até 1.</h3>
<hr>

    <form method="post">
        <div class="mb-3">
            <label for="numero" class="form-label">Informe um número inteiro positivo:</label>
            <input type="number" class="form-control" id="numero" name="numero" min="1" required>
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>

    <div class="mb-3 mt-3">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero = intval($_POST["numero"]);
                echo "<h4>Contagem regressiva a partir de $numero até 1:</h4>";
                echo "<p>";
                $contador = $numero;
                do {
                    echo $contador . " ";
                    $contador--;
                } while ($contador >= 1);
                echo "</p>";
            }
        ?>
    </div>

<?php
    include("rodape.php");
?>