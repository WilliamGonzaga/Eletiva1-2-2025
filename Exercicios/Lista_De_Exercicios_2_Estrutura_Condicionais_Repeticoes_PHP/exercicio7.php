
<?php
    include("cabecalho.php");
?>
<h3 >7 - Crie um formulário para que o usuário informe um número. Use um loop
while para somar todos os números de 1 até o número informado e exibir o
resultado.</h3>
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
                $soma = 0;
                $contador = 1;

                while ($contador <= $numero) {
                    $soma += $contador;
                    $contador++;
                }

                echo "<h4>A soma dos números de 1 até $numero é: $soma</h4>";
            }
        ?>
    </div>


<?php
    include("rodape.php");
?>