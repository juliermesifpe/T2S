<!DOCTYPE html>
<html lang="en">
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
            
            $sql = "SELECT movimentacao, fkNumeroConteiner, COUNT(*) AS C FROM movimentacao GROUP BY movimentacao ORDER BY fkNumeroConteiner";
            
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="tabela">';
                echo '<h1>Total de Movimentações</h1>';
                    echo '<table>';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th>Cliente</th>';
                                echo '<th>Quantidade</th>';
                                echo '<th>Movimentacao</th>';
                                echo '<th>Número Contêiner</th>';
                            echo '</tr>';
                        echo '</thead>';
                       
                        while($row = mysqli_fetch_assoc($result)){
                        
                        $sql2 = "SELECT * FROM conteiner WHERE numeroConteiner='".$row['fkNumeroConteiner']."'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);

                        echo '<tbody>';
                            echo '<tr>';
                                echo '<td>'.$row2['cliente'].'</td>';
                                echo '<td>'.$row['C'].'</td>';
                                echo '<td>'.$row['movimentacao'].'</td>';
                                echo '<td>'.$row['fkNumeroConteiner'].'</td>';
                            echo '</tr>';
                        echo '</tbody>';      
                        }
                    echo '</table>';
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
            }else {
            
            }      
            mysqli_close($conn);
        ?>
        </main>

        <footer>
            <?php include "rodape.php";?>
        </footer>
    </body>
</html>