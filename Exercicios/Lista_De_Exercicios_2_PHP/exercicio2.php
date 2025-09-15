


<?php
    include("cabecalho.php");
    echo "<h3>2 - Escreva um programa para calcular a soma dos dois valores de entrada. Se
os dois valores forem iguais, retorne o triplo da soma.</h3>";

    echo '<form method="post">';
    echo '<label for="num1">Número 1: </label>';
    echo '<input type="number" name="num1" required><br>';

    echo '<label for="num2">Número 2: </label>';
    echo '<input type="number" name="num2" required><br>';

    echo '<button type="submit">Enviar</button>';
    echo '</form>';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        if ($num1 == $num2) {
            $soma = 3 * ($num1 + $num2);
        } else {
            $soma = $num1 + $num2;
        }

        echo "<p>Soma: $soma</p>";
    }


    include("rodape.php");
?>