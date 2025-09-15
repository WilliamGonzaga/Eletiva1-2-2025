
<?php
    include("cabecalho.php");
?>

<h3>4 - Faça um programa em PHP onde o valor de um produto é informado. Se
esse valor for superior a R$100,00 deve ser aplicado um desconto de 15%
sobre ele e exibido o novo valor do produto.</h3>

<hr>

<form method="post">
    <div class="mb-3">
        <label for="valor" class="form-label">Valor do Produto:</label>
        <input type="number" id="valor" name="valor" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcular</button>
</form>

<div class="mb-3 mt-3">
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $valor = $_POST['valor'];
            if ($valor > 100) {
                $desconto = $valor * 0.15;
                $novo_valor = $valor - $desconto;
                echo "<p>Valor original: R$ " . number_format($valor, 2, ',', '.') . "</p>";
                echo "<p>Valor com desconto: R$ " . number_format($novo_valor, 2, ',', '.') . "</p>";
            } else {
                echo "<p>Valor R$ " . number_format($valor, 2, ',', '.') . ".</p>";
            }
        }
    ?>
</div>

<?php
    include("rodape.php");
?>