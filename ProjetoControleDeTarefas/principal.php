<?php
    require('cabecario.php');
?>
    <h1>Seja Bem Vinda(o) <?= $_SESSION['nome']?></h1>
    <h6><a href="logout.php">sair</a></h6>

<?php
    require('rodape.php')
?>