<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contêiner</title>
    </head>
   
    <body>
        <?php include "cabecalho.php"; ?>
        
        <main>
            <form action="conteiner_incluir.php" method="post">
                <label for="">Número do contêiner:</label>
                <input type="text" name="numero_conteiner" required>
                
                <label for="">Cliente:</label>
                <input type="text" name="cliente" required>
                
                <label for="">Tipo:</label>
                <input type="number" name="tipo" required>
                
                <label for="">Status:</label>
                <input type="text" name="status" required>
                
                <label for="">Categoria:</label>
                <input type="text" name="categoria" required>
            </form>
        </main>

        <?php include "rodape.php"; ?>
    </body>
</html>