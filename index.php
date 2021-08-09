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
            <div class="formulario">
                <h1>Cadastro de Contêiner</h1>
                <form action="funcoes.php" method="post">
                    <input type="hidden" name="conteinerIncluir" value="conteinerIncluir">
                    
                    <label for="">Número do contêiner:</label>
                    <input type="text" name="numeroConteiner" placeholder="Ex: 4 letras e 7 números. Ex: TEST1234567" 
                    minlength="11" maxlength="11" required>

                    <label for="">Cliente:</label>
                    <input type="text" name="cliente" placeholder="Ex: Transpotes LTDA" 
                    minlength="2" maxlength="30" required>

                    <label for="">Tipo:</label>
                    <select name="tipo" required>
                        <option Value=""></option>
                        <option Value="20">20</option>
                        <option value="40">40</option>
                    </select>

                    <label for="">Status:</label>
                    <select name="status" required>
                        <option Value=""></option>
                        <option Value="cheio">Cheio</option>
                        <option value="vazio">Vazio</option>
                    </select>

                    <label for="">Categoria:</label>
                    <select name="categoria" required>
                        <option value=""></option>
                        <option Value="importacao">Importação</option>
                        <option value="exportacao">Exportação</option>
                    </select>

                    <input type="submit" value="Enviar">
                    <input type="reset" value="Limpar">
                </form>
            </div>
        </main>

        <?php include "rodape.php"; ?>
    </body>
</html>