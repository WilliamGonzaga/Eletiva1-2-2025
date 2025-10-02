<?php
    include("cabecalho.php");
?>
    <h3>3 - Crie um formulário que leia dados de 5 produtos, que são: código, nome e preço. Leia os dados e crie um mapa ordenado onde as chaves são os códigos dos produtos e os valores são também mapas ordenados com o nome e o preço dos produtos. Aplique um desconto de 10% em todos os produtos com preço acima de R$100,00 e exiba a lista ordenada pelo nome do produto.</h3>
    <hr>

    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="codigo[]" class="form-label">Informe o <?= $i ?>° código:</label>
                <input type="text" id="codigo[]" name="codigo[]" class="form-control" required>
                <label for="nome[]" class="form-label">Informe o <?= $i ?>° nome:</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required>
                <label for="preco[]" class="form-label">Informe o <?= $i ?>° preço:</label>
                <input type="number" step="0.01" id="preco[]" name="preco[]" class="form-control" required>
            <?php endfor; ?>    
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $codigos = $_POST['codigo'];
            $nomes = $_POST['nome'];
            $precos = $_POST['preco'];
            $produtos = [];

            for($i = 0; $i < count($codigos); $i++){
                $codigo = trim($codigos[$i]);
                $nome = trim($nomes[$i]);
                $preco = floatval($precos[$i]);

                if($preco > 100){
                    $preco *= 0.9; 
                }

                $produtos[$codigo] = [
                    'nome' => $nome,
                    'preco' => $preco
                ];
            }

            
            usort($produtos, function($a, $b) {
                return strcmp($a['nome'], $b['nome']);
            });

            echo "<h4>Lista de Produtos:</h4>";
            foreach($produtos as $codigo => $info){
                echo "<p>Código: $codigo, Nome: {$info['nome']}, Preço: " . number_format($info['preco'], 2) . "</p>";
            }
        }
    ?>


<?php
    include("rodape.php");
?>