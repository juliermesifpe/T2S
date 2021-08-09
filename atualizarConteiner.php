<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "configuracao.php"; ?>
        <title>Atualizar</title>
    </head>
   
    <body>
        <?php include "cabecalho.php"; ?>

        <?php?>    
        
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

                $sql = "SELECT * FROM conteiner WHERE numeroConteiner ='".$_GET['atualizarConteiner']."'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
            
            <form action="funcoes.php" method="post">
                <label for="">Número do contêiner:</label>
                <input value="<?php echo $row['numeroConteiner']?>" disabled>
                <input type="hidden" name="numeroConteiner" value="<?php echo $row['numeroConteiner']?>" required>

                <label for="">Cliente:</label>
                <input type="text" name="cliente" placeholder="Ex: Transpotes LTDA" 
                minlength="2" maxlength="30" value="<?php echo $row['cliente']?>" required >

                <label for="">Tipo:</label>
                <input type="number" name="tipo" placeholder="Ex: 20 ou 40" 
                minlength="2" maxlength="2" value="<?php echo $row['tipo']?>" required>

                
                <label for="">Status:</label>
                <input type="text" name="status" placeholder="Ex: Cheio ou Vazio" 
                minlength="5" maxlength="5" value="<?php echo $row['status']?>" required>

                <label for="">Categoria:</label>
                <input type="text" name="categoria" placeholder="Ex: Importação ou Exportação" 
                minlength="10" maxlength="10" value="<?php echo $row['categoria']?>" required>

                <input type="submit" value="Enviar">
                <input type="reset" value="Limpar">
                <a href="conteiner.php"><input type="button" value="Voltar"></a>
            </form>
        </main>

        <?php include "rodape.php"; ?>
    </body>
</html>