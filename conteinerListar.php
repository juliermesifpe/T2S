<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php include "configuracao.php"; ?>
        <title>Contêiner</title>
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
                
                if(!empty($_POST['conteinerOrdenar'])){
                    $sql = "SELECT * FROM conteiner ORDER BY ".$_POST['conteinerOrdenar']." ";
                    $result = mysqli_query($conn, $sql);
                }
                else{
                    $sql = "SELECT * FROM conteiner";
                    $result = mysqli_query($conn, $sql);
                }
                
                if(!empty($_GET['retorno'])){echo $_GET['retorno'];}

                echo '<div class="tabela">';
                    echo '<h1>Contêiner Cadastrados</h1>';
                    echo '<table>';
                        echo '<thead>';
                            echo '<tr>';
                                echo '<th>Número Contêiner</th>';
                                echo '<th>Cliente</th>';
                                echo '<th>Tipo</th>';
                                echo '<th>Status</th>';
                                echo '<th>Categoria</th>';
                                echo '<th colspan="1">Operações</th>';
                                echo '<th colspan="2">Contêiner</th>';
                            echo '</tr>';
                        echo '</thead>';
                        
                        while($row = mysqli_fetch_assoc($result)) {   
                        echo '<tbody>';
                            echo '<tr>';
                                echo '<td>'.$row['numeroConteiner'].'</td>';
                                echo '<td>'.$row['cliente'].'</td>';
                                echo '<td>'.$row['tipo'].'</td>';
                                echo '<td>'.$row['status'].'</td>';
                                echo '<td>'.$row['categoria'].'</td>';
                                echo '<td><a href="movimentacaoIncluir.php?operacoes='.$row['numeroConteiner'].'"><input type="button" value="Realizar"></a></td>';
                                echo '<td><a href="conteinerAtualizar.php?conteinerAtualizar='.$row['numeroConteiner'].'"><input type="button" value="Atualizar"></a></td>';
                                echo '<td><a href="funcoes.php?conteinerExcluir='.$row['numeroConteiner'].'"><input type="button" value="Excluir"></a></td>';  
                            echo '</tr>';
                        echo '</tbody>';}
                    echo '</table>';
                    echo'
                        <form action="conteinerListar.php" method="post">
                            <div class="pesquisar">
                                
                                <select name="conteinerOrdenar" class="ordenar" required>
                                    <option value="">Ordenar</option>
                                    <option Value="numeroConteiner">Número Contêiner</option>
                                    <option value="cliente">Cliente</option>
                                    <option Value="tipo">Tipo</option>
                                    <option value="status">Status</option>
                                    <option value="categoria">Categoria</option>
                                </select>

                                <section class="filtrar">
                                    <input type="submit" value="Aplicar" >
                                </section>
                            </div>
                        </form>
                    ';
                echo '</div>'; 
            ?>
        </main>
                           
        <?php include "rodape.php"; ?>
    </body>
</html>