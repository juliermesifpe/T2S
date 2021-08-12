<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "configuracao.php"; ?>
        <title>Movimentação</title>
    </head>
   
    <body>
        
        <?php include "cabecalho.php"; ?>

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

                if(!empty($_POST['movimentacaoListarOrdenar'])){
                    $sql = "SELECT * FROM movimentacao ORDER BY ".$_POST['movimentacaoListarOrdenar']." ";
                    $result = mysqli_query($conn, $sql);
                }else{
                    $sql = "SELECT * FROM movimentacao ORDER BY id";
                    $result = mysqli_query($conn, $sql);
                }

                if(!empty($_GET['retorno'])){echo $_GET['retorno'];}

                echo'
                <div id="buscar">
                    <input type="text" name="pesquisar" placeholder="Pesquisar" id="pesquisar">
                
                    <input type="submit" value="Filtrar" id="filtrar">
                </div>

                <div class="tabela">
                    <h1>Movimentações Realizadas</h1>
                
                    <table>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Movimentação</th>
                                <th>Data e Hora Inicial</th>
                                    <th>Data e Hora Final</th>
                                    <th colspan="1">Número do Contêiner</th>
                                <th colspan="2">Opções</th>
                            </tr>
                        </thead>';
                        
                        while($row = mysqli_fetch_assoc($result)) {   
                            echo '<tbody>
                                <tr>
                                    <td>'.$row['id'].'</td>
                                    <td>'.$row['movimentacao'].'</td>
                                    <td>'.date("d/m/Y H:i:s", strtotime($row['dataInicio'])).'</td>
                                    <td>'.date("d/m/Y H:i:s", strtotime($row['dataFim'])).'</td>
                                    <td>'.$row['fkNumeroConteiner'].'</td>
                                    <td><a href="atualizarMovimentacao.php?atualizarMovimentacao='.$row['id'].'"> <input type="button" value="Atualizar"></a></td>
                                    <td><a href="funcoes.php?excluirMovimentacao='.$row['id'].'"> <input type="button" value="Excluir"></a></td>
                                </tr>
                            </tbody>';
                        } 
                    echo'</table>

                    <form action="movimentacaoListar.php" method="post">
                        <div class="movimentacaoPesquisar">
                            <select name="movimentacaoListarOrdenar" class="movimentacaoListarOrdenar" required>
                                <option value="">Ordenar</option>
                                <option Value="id">Número Id</option>
                                <option value="movimentacao">Movimentação</option>
                                <option Value="dataInicio">Data e Hora Inicial</option>
                                <option value="dataFim">Data e Hora Final</option>
                                <option value="fkNumeroConteiner">Número Contêiner</option>
                            </select>

                            <section class="movimentacaoFiltrar">
                                <input type="submit" value="Aplicar" >
                            </section>

                            <section class="movimentacaoRelatorio">
                                <a href="movimentacaoRelatorio.php"><input type="button" value="Relatório"></a>
                            </section>
                        </div>
                    </form>

                </div>';
            ?>
        </main>
                           
        <?php include "rodape.php"; ?>
    </body>
</html>