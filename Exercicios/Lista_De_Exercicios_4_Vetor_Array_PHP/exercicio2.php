<?php
    include("cabecalho.php");
?>
    <h3>2 - Crie um formulário que leia dados de 5 alunos: nome e três notas. Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos alunos e os valores são as médias das notas. Exiba a lista de alunos ordenada pela média das notas (do maior para o menor).</h3>
    <hr>

    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="nome[]" class="form-label">Informe o <?= $i ?>° nome:</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required>
                <label for="nota1[]" class="form-label">Informe a <?= $i ?>° nota 1:</label>
                <input type="number" step="0.01" id="nota1[]" name="nota1[]" class="form-control" required>
                <label for="nota2[]" class="form-label">Informe a <?= $i ?>° nota 2:</label>
                <input type="number" step="0.01" id="nota2[]" name="nota2[]" class="form-control" required>
                <label for="nota3[]" class="form-label">Informe a <?= $i ?>° nota 3:</label>
                <input type="number" step="0.01" id="nota3[]" name="nota3[]" class="form-control" required>
            <?php endfor; ?>    
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $nomes = $_POST['nome'];
            $notas1 = $_POST['nota1'];
            $notas2 = $_POST['nota2'];
            $notas3 = $_POST['nota3'];
            $alunos = [];

            for($i = 0; $i < count($nomes); $i++){
                $nome = trim($nomes[$i]);
                $nota1 = floatval($notas1[$i]);
                $nota2 = floatval($notas2[$i]);
                $nota3 = floatval($notas3[$i]);

                $media = ($nota1 + $nota2 + $nota3) / 3;
                $alunos[$nome] = $media;
            }

            arsort($alunos);

            echo "<h4>Lista de Alunos por Média:</h4>";
            foreach($alunos as $nome => $media){
                echo "<p>$nome: " . number_format($media, 2) . "</p>";
            }
        }
    ?>


<?php
    include("rodape.php");
?>