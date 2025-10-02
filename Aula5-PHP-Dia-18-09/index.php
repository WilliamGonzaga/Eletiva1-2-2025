<?php

    $valor = array(1,2,3,4,5);

    echo "<p>Primeiro valor do vetor: ".$valor[0]."</p>";

    //$v = $_POST['nome'];

    $vetor = [1,2,3,4,5];
    //Função para exibir valores do vetor
    var_dump($vetor);
    print_r($vetor);

    $vetor[4] = 6;

    echo "<p>Novo Valor da posição 4: ".$vetor[4]."</p>";

    $vetor["nome"] = "William";
    print_r($vetor);

    $valores = [
        'nome' => "William",
        "sobrenome" => 'Gonzaga',
        'idade' => 30
    ];

    foreach($valores as $c => $v){
        echo "<p>Posição: $c = Valor $v</p>";
    }




?>