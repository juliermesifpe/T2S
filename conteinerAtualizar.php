<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "configuracao.php"; ?>
        <title>Atualizar Contêiner</title>
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

                $sql = "SELECT * FROM conteiner WHERE numeroConteiner ='".$_GET['conteinerAtualizar']."'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
            ?>
            
            <div class="formulario">
                <h1>Atualizar Informações do Contêiner</h1>
                <form action="funcoes.php" method="post">
                    <input type="hidden" name="conteinerAtualizar" value="conteinerAtualizar">

                    <label for="">Número do contêiner:</label>
                    <input value="<?php echo $row['numeroConteiner']?>" disabled>
                    <input type="hidden" name="numeroConteiner" value="<?php echo $row['numeroConteiner']?>" required>

                    <label for="">Cliente:</label>
                    <input type="text" name="cliente" placeholder="Ex: Transpotes LTDA" 
                    minlength="2" maxlength="30" value="<?php echo $row['cliente']?>" required >

                    <label for="">Tipo:</label>
                    <select name="tipo" required>
                        <option Value="<?php echo $row['tipo']?>"><?php echo $row['tipo']?></option>
                        <option Value="20">20</option>
                        <option value="40">40</option>
                    </select>

                    <label for="">Status:</label>
                    <select name="status" required>
                        <option Value="<?php echo $row['status']?>"><?php echo $row['status']?></option>
                        <option Value="cheio">Cheio</option>
                        <option value="vazio">Vazio</option>
                    </select>

                    <label for="">Categoria:</label>
                    <select name="categoria" required>
                        <option value="<?php echo $row['categoria']?>"><?php echo $row['categoria']?></option>
                        <option Value="importacao">Importação</option>
                        <option value="exportacao">Exportação</option>
                    </select>

                    <input type="submit" value="Enviar">
                    <a href="conteiner.php"><input type="button" value="Voltar"></a>
                </form>
            </div>
        </main>

        <?php include "rodape.php"; ?>
    </body>
</html>