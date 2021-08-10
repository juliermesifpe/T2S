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
                    $sql = "SELECT * FROM movimentacao";
                $result = mysqli_query($conn, $sql);
                }
                
                if(!empty($_GET['retorno'])){echo $_GET['retorno'];}
        
                echo '<div class="tabela">';
                    echo '<h1>Movimentações Realizadas</h1>';
                    
                    echo '<table>';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th>Id</th>';
                                echo '<th>Movimentação</th>';
                                echo '<th>Data e Hora Inicial</th>';
                                echo '<th>Data e Hora Final</th>';
                                echo '<th colspan="1">Número do Contêiner</th>';
                                echo '<th colspan="2">Opções</th>';
                            echo '</tr>';
                        echo '</thead>';
                        while($row = mysqli_fetch_assoc($result)) {   
                        echo '<tbody>';
                            echo '<tr>';
                                echo '<td>'.$row['id'].'</td>';
                                echo '<td>'.$row['movimentacao'].'</td>';
                                echo '<td>'.date("d/m/Y H:i:s", strtotime($row['dataInicio'])).'</td>';
                                echo '<td>'.date("d/m/Y H:i:s", strtotime($row['dataFim'])).'</td>';
                                echo '<td>'.$row['fkNumeroConteiner'].'</td>';
                                echo '<td><a href="atualizarMovimentacao.php?atualizarMovimentacao='.$row['id'].'"> <input type="button" value="Atualizar"></a></td>';
                                echo '<td><a href="funcoes.php?excluirMovimentacao='.$row['id'].'"> <input type="button" value="Excluir"></a></td>';  
                            echo '</tr>';
                        echo '</tbody>';} 
                        echo '<tfoot>';
                            echo '<tr>';
                            echo '</tr>';
                        echo '</tfoot>'; 
                    echo '</table>';
                    echo'
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
                                    <input type="submit" value="Filtrar" >
                                </section>

                                <section class="movimentacaoRelatorio">
                                    <a href="movimentacaoRelatorio.php"><input type="button" value="Relatório"></a>
                                </section>
                            </div>
                        </form>
                    ';
                echo '</div>'
           ?>
        </main>
                           
        <?php include "rodape.php"; ?>
    </body>
</html>