
<?php
    include("cabecalho.php");
?>

<h3>9 - Crie um formulário para que o usuário informe um número. Use um loop
for para calcular o fatorial desse número e exibir o resultado.</h3>
<hr>

    <form method="post">
        <div class="mb-3">
            <label for="numero" class="form-label">Informe um número inteiro não negativo:</label>
            <input type="number" class="form-control" id="numero" name="numero" min="0" required>
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>

    <div class="mb-3 mt-3">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $numero = intval($_POST["numero"]);
                $fatorial = 1;

                for ($i = 1; $i <= $numero; $i++) {
                    $fatorial *= $i;
                }

                echo "<h4>O fatorial de $numero é: $fatorial</h4>";
            }
        ?>
    </div>


<?php
    include("rodape.php");
?>