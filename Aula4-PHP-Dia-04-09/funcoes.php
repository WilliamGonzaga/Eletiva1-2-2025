<?php
    $name = "William";
    echo "<p> Todas em Maiúsculo: ".strtoupper($name)."</p>";
    echo "<p> Todas em Minúscula: ".strtolower($name)."</p>";
    echo "<p> Todas em Caratcteres: ".strlen($name)."</p>";

    $posicao = strpos($name, "l");

    echo "<p> Caracter L na posição $posicao </p>";

    date_default_timezone_set('America/Sao_Paulo');
    $date1 = date("d/m/Y");
    $dia = date("d");
    $hora = date("H:i:s");

    echo "<p> Data: $date1 </p>";
    echo "<p> Dia: $dia </p>";
    echo "<p> Data: $hora </p>";


    if(checkdate(2, 30, 2025)){
        echo "<p> A data informada existe (30/02/2025)</p>";

    } else {
        echo "<p> A data informada não existe (30/02/2025)</p>";
    }

    $valor = -10;
    echo "<p>Valor absoluto: ".abs($valor)."</p>";

    $valor = 5.9;
    echo "<p>Valor arrendindado: ".round($valor)."</p>";
    
    $valor = rand(1, 100);
    echo "<p>Valor aleatorio: $valor </p>";

    echo "<p>Raiz quadrada de 16: ".sqrt(16)."  </p>";

    $valor = 13.5;
    echo "<p>Valor formatado: ".number_format($valor, 2, ",",".")." </p>";


    function exibirSaucacao(){
        echo "<p>Olá Mundo</p>";
    }

    exibirSaucacao();

    function exibirSaucacaoComNome($nome){
        echo "<p>Seja Bem Vindo $nome </p>";
    }

    exibirSaucacaoComNome("William");


    function menorValor($valor1, $valor2){
        return min($valor1, $valor2);
    }

    echo "Menor Valor entre 4 e 8:".menorValor(8,4);

    function somarValores(...$numeros){
        return array_sum($numeros);
    }

    $soma = somarValores(1,2,3,4,5,6);

    echo "<p>A Soma dos valores é: $soma </p>";


?>