<?php
    include("cabecalho.php");
?>
    <h3>4 - Crie um formulário que leia dados de 5 itens: nome e preço. Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos itens e os valores são os preços após aplicação de um imposto de 15%. Exiba a lista ordenada pelos preços após a aplicação do imposto.</h3>
    <hr>

    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
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
            $nomes = $_POST['nome'];
            $precos = $_POST['preco'];
            $itens = [];

            for($i = 0; $i < count($nomes); $i++){
                $nome = trim($nomes[$i]);
                $preco = floatval($precos[$i]);

                $precoComImposto = $preco * 1.15; 
                $itens[$nome] = $precoComImposto;
            }

            asort($itens);

            echo "<h4>Lista de Itens com Imposto:</h4>";
            foreach($itens as $nome => $preco){
                echo "<p>$nome: " . number_format($preco, 2) . "</p>";
            }
        }   
    ?>


<?php
    include("rodape.php");
?>