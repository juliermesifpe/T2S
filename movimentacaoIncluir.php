<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "configuracao.php"?>
        <title>Operações</title>
    </head>

    <body>
        <?php include "cabecalho.php";?>

        <main>
            <div class="formulario">
                <h1>Realizar Movimentação</h1>
                <form action="funcoes.php" method="post">
                    <input type="hidden" name="incluirMovimentacao" value="incluirMovimentacao">
                        
                    <label for="">Número do contêiner:</label>
                    <input value="<?php echo $_GET['operacoes']?>" disabled>
                    <input type="hidden" name="fkNumeroConteiner" value="<?php echo $_GET['operacoes']?>" required>

                    <label for=""> Selecione o Tipo de Movimentação:</label>
                    <select name="movimentacao" required>
                        <option Value="Nenhuma"></option>
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
                    <input type="reset" value="Limpar">
                    <a href="conteiner.php"><input type="button" value="Voltar"></a>
                </form>
            </div>
        </main>

        <?php include "rodape.php"?>
    </body>
</html>