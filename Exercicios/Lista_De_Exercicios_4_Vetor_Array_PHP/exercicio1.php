<?php
    include("cabecalho.php");
?>
    <h3>1 - Crie um formulário que leia dados de 5 contatos: nome e número de telefone. Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos contatos e os valores são os números de telefone. Verifique se há duplicatas de nome ou número de telefone antes de adicionar um novo contato. Exiba a lista ordenada pelos nomes dos contatos.</h3>
    <hr>


    <div class="container py-3">
        <h1>Exercício exemplo - vetores</h1>
        <form method="post">
            <div class="mb-3">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <label for="valor[]" class="form-label"><?= $i ?>° - Informe o nome:</label>
                    <input type="text" id="valor[]" name="valor[]" class="form-control">

                    <label for="valor[]" class="form-label"><?= $i ?>° - Informe o número de telefone:</label>
                    <input type="number" id="valor[]" name="valor[]" class="form-control">

                <?php endfor; ?>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
            if($_SERVER['REQUEST_METHOD']== 'POST'){
                $vetor = $_POST['valor'];
                sort($vetor);
                foreach($vetor as $v){
                    echo "<p>$v <?p>";
                }
            }

        ?>


<?php
    include("rodape.php");
?>