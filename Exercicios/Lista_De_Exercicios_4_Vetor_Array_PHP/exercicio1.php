<?php
    include("cabecalho.php");
?>
    <h3>1 - Crie um formulário que leia dados de 5 contatos: nome e número de telefone. Leia os dados e crie um mapa ordenado onde as chaves são os nomes dos contatos e os valores são os números de telefone. Verifique se há duplicatas de nome ou número de telefone antes de adicionar um novo contato. Exiba a lista ordenada pelos nomes dos contatos.</h3>
    <hr>
    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <label for="nome[]" class="form-label">Informe o <?= $i ?>° nome:</label>
                <input type="text" id="nome[]" name="nome[]" class="form-control" required>
                <label for="telefone[]" class="form-label">Informe o <?= $i ?>° telefone:</label>
                <input type="text" id="telefone[]" name="telefone[]" class="form-control" required>
            <?php endfor; ?>    
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>   
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $nomes = $_POST['nome'];
            $telefones = $_POST['telefone'];
            $contatos = [];

            for($i = 0; $i < count($nomes); $i++){
                $nome = trim($nomes[$i]);
                $telefone = trim($telefones[$i]);

                if(array_key_exists($nome, $contatos)){
                    echo "<p>O nome '$nome' já existe. Contato não adicionado.</p>";
                } elseif(in_array($telefone, $contatos)){
                    echo "<p>O telefone '$telefone' já existe. Contato não adicionado.</p>";
                } else {
                    $contatos[$nome] = $telefone;
                }
            }

            ksort($contatos);

            echo "<h4>Lista de Contatos:</h4>";
            foreach($contatos as $nome => $telefone){
                echo "<p>$nome: $telefone</p>";
            }
        }
    ?>


<?php
    include("rodape.php");
?>