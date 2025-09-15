
<?php
    include("cabecalho.php");

?>

    <h3>1 - Escreva um programa que leia 7 números diferentes, imprima o menor
    valor e imprima a posição do menor valor na sequência de entrada.</h3>

    <hr>

        <form method="post">
        <div class="row inline-row mb-3">
            <div class="col-md-6">
                <?php for ($i = 1; $i <= 7; $i++): ?>
                
                    <label for="num<?= $i ?>" class="form-label">Número <?= $i ?>:</label>
                    <input type="number" id="num<?= $i ?>" name="num<?= $i ?>" class="form-control" required>
            
                <?php endfor; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

    <div class="mb-3 mt-3">    
        <?php
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $numeros = [];
                for ($i = 1; $i <= 7; $i++) {
                    $numeros[] = $_POST['num'.$i];
                }

                $menor = min($numeros);
                $posicao = array_search($menor, $numeros) + 1;

                echo "<p>Menor valor: $menor</p>";
                echo "<p>Posição do menor valor: $posicao</p>";
            }

        ?>
    </div>
<?php
    include("rodape.php");
    
?>