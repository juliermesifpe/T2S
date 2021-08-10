<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "configuracao.php";?>
        <title>Relatório</title>
    </head>
    <body>
        <header>
            <?php include "cabecalho.php";?>
        </header>

        <mani>
        <?php
            $servername = "localhost:3308";
            $username = "root";
            $password = "";
            $dbname = "T2S";
        
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            if (!$conn) {
                die(mysqli_connect_error());
            }
            
            if(empty($_POST['movimentacaoRelatorioOrdenar'])){
                $sql = "SELECT movimentacao, fkNumeroConteiner, COUNT(*) AS quantidade FROM movimentacao GROUP BY movimentacao ORDER BY quantidade";
                $result = mysqli_query($conn, $sql);
            }
            elseif($_POST['movimentacaoRelatorioOrdenar'] != "cliente"){
                $sql = "SELECT movimentacao, fkNumeroConteiner, COUNT(*) AS quantidade FROM movimentacao GROUP BY movimentacao ORDER BY ".$_POST['movimentacaoRelatorioOrdenar']."";
                $result = mysqli_query($conn, $sql);
            }
            else{
                $sql = "SELECT numeroConteiner, cliente FROM conteiner ORDER BY ".$_POST['movimentacaoRelatorioOrdenar']."";
                $result = mysqli_query($conn, $sql);
            }
                echo '<div class="tabela">';
                echo '<h1>Total de Movimentações</h1>';
                    echo '<table>';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th>Cliente</th>';
                                echo '<th>Quantidade</th>';
                                echo '<th>Movimentacao</th>';
                            echo '</tr>';
                        echo '</thead>';
                       
                        while(($row = mysqli_fetch_assoc($result))){
                        
                        if(empty($_POST['movimentacaoRelatorioOrdenar'])){
                            $sql2 = "SELECT * FROM conteiner WHERE numeroConteiner='".$row['fkNumeroConteiner']."'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                        }
                        elseif($_POST['movimentacaoRelatorioOrdenar'] != "cliente"){
                            $sql2 = "SELECT * FROM conteiner WHERE numeroConteiner='".$row['fkNumeroConteiner']."'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                        }
                        else{
                            $row2 = $row;
                            $sql2 = "SELECT movimentacao, fkNumeroConteiner, COUNT(*) AS quantidade FROM movimentacao WHERE fkNumeroConteiner='".$row['numeroConteiner']."'";
                            $result2 = mysqli_query($conn, $sql2);
                            $row = mysqli_fetch_assoc($result2);
                            
                        }
                        
                        echo '<tbody>';
                            echo '<tr>';
                                echo '<td>'.$row2['cliente'].'</td>';
                                echo '<td>'.$row['quantidade'].'</td>';
                                echo '<td>'.$row['movimentacao'].'</td>';
                            echo '</tr>';
                        echo '</tbody>';}
                    echo '</table>';
                    echo'
                    <form action="movimentacaoRelatorio.php" method="post">
                        <div class="pesquisar">
                            
                            <select name="movimentacaoRelatorioOrdenar" class="ordenar" required>
                                <option value="">Ordenar</option>
                                <option Value="quantidade">Quantidade</option>
                                <option value="movimentacao">Movimentação</option>
                            </select>

                            <section class="filtrar">
                                <input type="submit" value="Filtrar" >
                            </section>
                        </div>
                    </form>
                ';
                echo '</div>';
                
                echo '<div class="tabela">';
                    echo '<table>';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th>Exportação</th>';
                                echo '<th>Importação</th>';
                            echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                            echo '<tr>';
                            echo '</tr>';
                        echo '<tbody>';
                    echo '</table>';
                echo '</div>';
                 
            mysqli_close($conn);
        ?>
        </main>

        <footer>
            <?php include "rodape.php";?>
        </footer>
    </body>
</html>