
<?php

    include("cabecalho.php");

    // 1 - Domingo 2 - Segunda

    $diaSemana = 3;

    switch($diaSemana){
        case 1:
            echo "Hoje é Domingo!";
            break;
        case 2:
            echo "Hoje é Segunda-Feira!";
            break;
        case 3:
            echo "Hoje é Terça-Feira!";
            break;
        case 4:
            echo "Hoje é Quarta-Feira!";
            break;
        case 5:
            echo "Hoje é Quinta-Feira!";
            break;
        case 6:
            echo "Hoje é Sexta-Feira!";
            break;
        default:
            echo "Hoje é Sabado-Feira!"; 
     
    }


    include("rodape.php");
?>



