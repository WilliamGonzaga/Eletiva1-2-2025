<?php
    include("cabecalho.php");
?>
   <h3>5 - Crie um formulário que leia dados de 5 livros: título e quantidade em estoque. Leia os dados e crie um mapa ordenado onde as chaves são os títulos dos livros e os valores são a quantidade em estoque. Verifique se a quantidade em estoque é inferior a 5 e exiba um alerta para os livros com baixa quantidade. Exiba a lista ordenada pelo título dos livros.</h3>
   <hr>

    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="titulo[]" class="form-label">Informe o <?= $i ?>° título:</label>
                <input type="text" id="titulo[]" name="titulo[]" class="form-control" required>
                <label for="quantidade[]" class="form-label">Informe a <?= $i ?>° quantidade em estoque:</label>
                <input type="number" id="quantidade[]" name="quantidade[]" class="form-control" required>
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $titulos = $_POST['titulo'];
            $quantidades = $_POST['quantidade'];
            $livros = [];

            for($i = 0; $i < count($titulos); $i++){
                $titulo = trim($titulos[$i]);
                $quantidade = intval($quantidades[$i]);

                $livros[$titulo] = $quantidade;
            }

            ksort($livros);

            echo "<h4>Lista de Livros:</h4>";
            foreach($livros as $titulo => $quantidade){
                if($quantidade < 5){
                    echo "<p style='color: red;'>Alerta: O livro '$titulo' está com baixa quantidade em estoque ($quantidade unidades).</p>";
                } else {
                    echo "<p>$titulo: $quantidade unidades</p>";
                }
            }
        }
    ?>



<?php
    include("rodape.php");
?>