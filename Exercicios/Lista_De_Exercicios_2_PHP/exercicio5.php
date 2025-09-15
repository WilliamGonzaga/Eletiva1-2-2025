

<?php
    include("cabecalho.php");
?>

<h3>5 - Faça um programa que leia o valor associado a um mês. Exemplo: 1 –
Janeiro, 2 – Fevereiro... Exiba o nome do mês associado = USE SWITCH</h3>
<hr>

    <form method="post">
        <div class="mb-3">
            <label for="mes" class="form-label">Informe o número do mês (1-12):</label>
            <input type="number" class="form-control" id="mes" name="mes" min="1" max="12" required>
            
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>

    <div class="mb-3 mt-3">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $mes = intval($_POST["mes"]);
                $nomeMes = "";

                switch ($mes) {
                    case 1:
                        $nomeMes = "Janeiro";
                        break;
                    case 2:
                        $nomeMes = "Fevereiro";
                        break;
                    case 3:
                        $nomeMes = "Março";
                        break;
                    case 4:
                        $nomeMes = "Abril";
                        break;
                    case 5:
                        $nomeMes = "Maio";
                        break;
                    case 6:
                        $nomeMes = "Junho";
                        break;
                    case 7:
                        $nomeMes = "Julho";
                        break;
                    case 8:
                        $nomeMes = "Agosto";
                        break;
                    case 9:
                        $nomeMes = "Setembro";
                        break;
                    case 10:
                        $nomeMes = "Outubro";
                        break;
                    case 11:
                        $nomeMes = "Novembro";
                        break;
                    case 12:
                        $nomeMes = "Dezembro";
                        break;
                    default:
                        $nomeMes = "Número inválido. Por favor, informe um número entre 1 e 12.";
                }

                echo "<h4>O mês correspondente ao número $mes é: $nomeMes</h4>";
            }
        ?>
    </div>



<?php
    include("rodape.php");
?>