<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "configuracao.php"; ?>
        <title>Cadastro</title>
    </head>
   
    <body>
        <?php include "cabecalho.php"; ?>

        <?php if(!empty($_GET['index'])){echo $_GET['index'];}?>    
        
        <main>
            <form action="funcoes.php" method="post">

                <label for="">Número do contêiner:</label>
                <input type="text" name="numeroConteiner" placeholder="Ex: 4 letras e 7 números. Ex: TEST1234567" 
                minlength="11" maxlength="11" required>

                <label for="">Cliente:</label>
                <input type="text" name="cliente" placeholder="Ex: Transpotes LTDA" 
                minlength="2" maxlength="30" required>
                
                <label for="">Tipo:</label>
                <input type="number" name="tipo" placeholder="Ex: 20 ou 40" 
                minlength="2" maxlength="2" required>
                
                <label for="">Status:</label>
                <input type="text" name="status" placeholder="Ex: Cheio ou Vazio" 
                minlength="5" maxlength="5" required>

                <label for="">Categoria:</label>
                <input type="text" name="categoria" placeholder="Ex: Importação ou Exportação" 
                minlength="10" maxlength="10" required>

                <input type="submit" value="Enviar">
                <input type="reset" value="Limpar">
            </form>
        </main>

        <?php include "rodape.php"; ?>
    </body>
</html>