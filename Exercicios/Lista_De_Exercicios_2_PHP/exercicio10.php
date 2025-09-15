<?php
    include("cabecalho.php");
?>

<h3>10 - Crie um formulário para que o usuário informe um número. Use um loop
for para imprimir a tabuada desse número de 1 a 10</h3>
<hr>

    <form method="post">
        <div class="mb-3">
            <label for="numero" class="form-label">Informe um número inteiro:</label>
            <input type="number" class="form-control" id="numero" name="numero" required>
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>

    <div class="mb-3 mt-3">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero = intval($_POST["numero"]);

                echo "<h4>Tabuada de $numero:</h4>";
                echo "<p>";
                for ($i = 1; $i <= 10; $i++) {
                    $resultado = $numero * $i;
                    echo "$numero x $i = $resultado<br>";
                }
                echo "</p>";
            }
        ?>
    </div>

<?php
    include("rodape.php");
?>