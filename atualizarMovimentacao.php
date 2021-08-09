<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "configuracao.php"?>
        <title>Operações</title>
    </head>

    <body>
        <?php include "cabecalho.php";?>

        <main>
            <?php
                $servername = "localhost:3308";
                $username = "root";
                $password = "";
                $dbname = "T2S";

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn) {
                    die(mysqli_connect_error());
                }

                $sql = "SELECT * FROM movimentacao WHERE id ='".$_GET['atualizarMovimentacao']."'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
            <div class="formulario">
                <h1>Atualizar Movimentação</h1>
            <form action="funcoes.php" method="post">
                <input type="hidden" name="atualizarMovimentacao" value="atualizarMovimentacao">
                
                <label for="">Operação:</label>
                <input value="<?php echo $row['id']?>" disabled>
                <input type="hidden" name="id" value="<?php echo $row['id']?>" required>

                <label for="">Número do contêiner:</label>
                <input value="<?php echo $row['fkNumeroConteiner']?>" disabled>

                <label for=""> Selecione o Tipo de Movimentação:</label>
                <select name="movimentacao" required>
                    <option Value="Nenhum"><?php echo $row['movimentacao']?></option>
                    <option value="Embarque">Embarque</option>
                    <option value="Descarga">Descarga</option>
                    <option value="Gate In">Gate In</option>
                    <option value="Gate out">Gate out</option>
                    <option value="Posicionamento">Posicionamento</option>
                    <option value="Pilha">Pilha</option>
                    <option value="Pesagem">Pesagem</option>
                    <option value="Scanner">Scanner</option>
                </select>

                <label for="">Data e Hora do Início:</label>
                <input type="datetime-local" name="dataInicio" required>

                <label for="">Data e Hora do Fim:</label>
                <input type="datetime-local" name="dataFim" required>

                <input type="submit" value="Enviar">
                <a href="movimentacao.php"><input type="button" value="Voltar"></a>
            </form>
            </div>
        </main>
               
        <?php include "rodape.php"?>
    </body>
</html>