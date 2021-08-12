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
                $conn = mysqli_connect(  
                    $servername = "localhost:3308",  
                    $username = "root", 
                    $password = "",
                    $dbname = "T2S"
                );
                
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
               

                echo'<div id="buscar">
                    <input type="text" name="pesquisar" placeholder="Pesquisar" id="pesquisar">
                
                    <input type="submit" value="Filtrar" id="filtrar">
                </div>';
               
                echo '<div class="tabela">
                   <h1>Contêiner Cadastrados</h1>
                    
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

                    <table>
                        <thead>
                            <tr>
                                <th>Número Contêiner</th>
                                <th>Cliente</th>
                                <th>Tipo</th>
                                <th>Status</th>
                                <th>Categoria</th>
                                <th colspan="1">Operações</th>
                                <th colspan="2">Contêiner</th>
                            </tr>
                        </thead>';
                        
                        while($row = mysqli_fetch_assoc($result)) {   
                            echo '<tbody>
                                <tr>
                                <td>'.$row['numeroConteiner'].'</td>
                                <td>'.$row['cliente'].'</td>
                                <td>'.$row['tipo'].'</td>
                                <td>'.$row['status'].'</td>
                                <td>'.$row['categoria'].'</td>
                                <td><a href="movimentacaoIncluir.php?operacoes='.$row['numeroConteiner'].'"><input type="button" value="Realizar"></a></td>
                                <td><a href="conteinerAtualizar.php?conteinerAtualizar='.$row['numeroConteiner'].'"><input type="button" value="Atualizar"></a></td>
                                <td><a href="funcoes.php?conteinerExcluir='.$row['numeroConteiner'].'"><input type="button" value="Excluir"></a></td>
                                </tr>
                            </tbody>';
                        }
                    echo '</table>
                </div>'; 
            ?>
        </main>
                           
        <?php include "rodape.php"; ?>
    </body>
</html>