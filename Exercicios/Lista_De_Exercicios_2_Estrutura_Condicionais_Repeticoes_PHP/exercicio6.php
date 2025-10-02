

<?php
    include("cabecalho.php");
?>

<h3>6 - Crie um formulário para que o usuário informe um número. Use um loop
for para imprimir todos os números de 1 até o número informado.</h3>
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

                echo "<h4>Números de 1 até $numero:</h4>";
                echo "<p>";
                for ($i = 1; $i <= $numero; $i++) {
                    echo $i . " ";
                }
                echo "</p>";
            }
        ?>
    </div>

<?php
    include("rodape.php");
?>