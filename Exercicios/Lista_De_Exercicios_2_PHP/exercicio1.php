

<?php
    include("cabecalho.php");
    
    echo "<h3>1 - Escreva um programa que leia 7 números diferentes, imprima o menor
valor e imprima a posição do menor valor na sequência de entrada.</h3></div>";


    echo '<form method="post">';
    for ($i = 1; $i <= 7; $i++) {
        echo '<label for="num'.$i.'">Número '.$i.': </label>';
        echo '<input type="number" name="num'.$i.'" required><br>';
    }
    echo '<button type="submit">Enviar</button>';
    echo '</form>';

   
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

    

    include("rodape.php");
?>