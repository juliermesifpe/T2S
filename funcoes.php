<?php

    if(!empty($_POST['conteinerIncluir'])){conteinerIncluir();}else{}

    if(!empty($_POST['conteinerAtualizar'])){conteinerAtualizar();}else{}


    if(!empty($_GET['conteinerExcluir'])){conteinerExcluir();}else{}

    if(!empty($_POST['incluirMovimentacao'])){incluirMovimentacao();}else{}

    if(!empty($_POST['atualizarMovimentacao'])){atualizarMovimentacao();}else{}

    if(!empty($_GET['excluirMovimentacao'])){excluirMovimentacao();}else{}
    
    function criarBanco(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password);

        if (!$conn) {
            die(mysqli_connect_error());
        }

        $sql = "CREATE DATABASE IF NOT EXISTS T2S DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";

        if (mysqli_query($conn, $sql)) {
            //header('Location: index.php?index=Criação do banco de dados sucesso!');
        }
        else {
            //header('Location: index.php?index=Criação do banco de dados erro!');
            //mysqli_connect_error();
        }

        mysqli_close($conn);
    }

    function criarTabelas(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
    
        if (!$conn) {
            die(mysqli_connect_error());
        }

        $sql = "CREATE TABLE IF NOT EXISTS conteiner (
            numeroConteiner VARCHAR(11) NOT NULL PRIMARY KEY,
            cliente VARCHAR(50) NOT NULL,
            tipo INT NOT NULL,
            `status` VARCHAR(5) NOT NULL,
            categoria VARCHAR(10) NOT NULL
        )";

         if (mysqli_query($conn, $sql)) {
            //header('Location: index.php?index=Criação da tabela contêiner sucesso!');
        } 
        else {
            //header('Location: index.php?index=Criação da tabela contêiner erro!');
            //mysqli_connect_error();
        }

        $sql = "CREATE TABLE IF NOT EXISTS movimentacao (
            id INT AUTO_INCREMENT PRIMARY KEY,
            movimentacao VARCHAR(50) NOT NULL,
            dataInicio TIMESTAMP NOT NULL,
            dataFim TIMESTAMP NOT NULL,
            fkNumeroConteiner VARCHAR(11) NOT NULL,
            FOREIGN KEY (fkNumeroConteiner) REFERENCES conteiner (numeroConteiner)
        )";

        //TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            
        if (mysqli_query($conn, $sql)) {
            //header('Location: index.php?index=Sucesso criação de tabela movimentacao!');
        } 
        else {
            //header('Location: index.php?index=Erro criação da tabela movimentacao!');
            //mysqli_connect_error();
        }
        mysqli_close($conn);
    }

    function conteinerIncluir(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die(mysqli_connect_error());
        }
        
        $numeroConteiner = $_POST['numeroConteiner']; 
        $cliente = $_POST['cliente'];
        $tipo = $_POST['tipo'];
        $status = $_POST['status'];
        $categoria = $_POST['categoria'];

        $sql = "INSERT INTO conteiner (numeroConteiner, cliente, tipo, `status`, categoria)
        VALUES ('$numeroConteiner', '$cliente', '$tipo', '$status', '$categoria')";
    
        if (mysqli_query($conn, $sql)) {
            header('Location: index.php?index= conteinerIncluir() SUCESSO!');
        } else {
            header('Location: index.php?index= conteinerIncluir() ERRO!');
            //mysqli_connect_error();
        }
        mysqli_close($conn);
    }

    function conteinerAtualizar(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    
        if (!$conn) {
            die(mysqli_connect_error());
        }

        $cliente = $_POST['cliente'];
        $tipo = $_POST['tipo'];
        $status = $_POST['status'];
        $categoria = $_POST['categoria'];
        $numeroConteiner = $_POST['numeroConteiner'];
        
        $sql = "UPDATE conteiner SET cliente='$cliente', tipo='$tipo', `status`='$status', categoria='$categoria' WHERE numeroConteiner='$numeroConteiner'";
    
        if (mysqli_query($conn, $sql)) {
            header('Location: conteiner.php?retorno= conteinerAtualizar() SUCESSO!');
        } else {
            header('Location: conteiner.php?retorno= conteinerAtualizar() ERRO!');
        }
    
        mysqli_close($conn);
    }

    function conteinerOrdenar(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die(mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM conteiner ORDER BY '".$_POST['conteinerOrdenar']."' ";
    }

    function conteinerExcluir(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die(mysqli_connect_error());
        }
        
        //$numeroConteiner = $_GET['excluir'];

        $sql = "DELETE FROM conteiner WHERE numeroConteiner='".$_GET['conteinerExcluir']."'";
    
        if (mysqli_query($conn, $sql)) {
            header('Location: conteinerListar.php?conteiner=Exclusão contêiner sucesso!');
        } else {
            header('Location: conteinerListar.php?conteiner=Exclusão contêiner erro!');
        }
        mysqli_close($conn);
    }
    
    function incluirMovimentacao(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die(mysqli_connect_error());
        }

        $movimentacao = $_POST['movimentacao'];
        $dataInicio = $_POST['dataInicio'];
        $dataFim = $_POST['dataFim'];
        $fkNumeroConteiner = $_POST['fkNumeroConteiner'];
        //$dataInicio = date("d-m-Y H:i:s", strtotime($_POST['dataInicio']));
        //$dataFim = date("d-m-Y H:i:s", strtotime($_POST['dataFim']));
        
        $sql = "INSERT INTO movimentacao (movimentacao, dataInicio, dataFim, fkNumeroConteiner)
        VALUES ('$movimentacao', '$dataInicio', '$dataFim', '$fkNumeroConteiner')";
     
         if (mysqli_query($conn, $sql)) {
            header('Location: movimentacaoListar.php?retorno= incluirMovimentacao() SUCESSO!');
         } else {
            header('Location: movimentacaoListar.php?retorno= incluirMovimentacao() ERRO!');
            //mysqli_connect_error();
         }
         mysqli_close($conn);
    }

    function excluirMovimentacao(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";
    
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die(mysqli_connect_error());
        }
        
        //$numeroConteiner = $_GET['excluir'];

        $sql = "DELETE FROM movimentacao WHERE id='".$_GET['excluirMovimentacao']."'";
    
        if (mysqli_query($conn, $sql)) {
            header('Location: movimentacaoListar.php?retorno= excluirMovimentacao() SUCESSO!');
        } else {
            header('Location: movimentacaoListar.php?retorno= excluirMovimentacao() ERRO!');
        }
        mysqli_close($conn);
    }

    function atualizarMovimentacao(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
    
        if (!$conn) {
            die(mysqli_connect_error());
        }

        $id = $_POST['id'];
        $movimentacao = $_POST['movimentacao'];
        $dataInicio = $_POST['dataInicio'];
        $dataFim = $_POST['dataFim'];
        
        $sql = "UPDATE movimentacao SET movimentacao='$movimentacao', dataInicio='$dataInicio', dataFim='$dataFim' WHERE id='$id'";
    
        if (mysqli_query($conn, $sql)) {
            header('Location: movimentacaoListar.php?retorno= atualizarMovimentacao() SUCESSO!');
        } else {
            header('Location: movimentacaoListar.php?retorno= atualizarMovimentacao() ERRO!');
        }
    
        mysqli_close($conn);
    }

    function listarConteiner(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die(mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM conteiner";
        $result = mysqli_query($conn, $sql);
        
        if(!empty($_GET['conteiner'])){echo $_GET['conteiner'];}

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="tabela">';
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
                            echo '<td><a href="operacoes.php?operacoes='.$row['numeroConteiner'].'">Realizar</a></td>';
                            echo '<td><a href="atualizar.php?atualizar='.$row['numeroConteiner'].'">Atualizar</a></td>';
                            echo '<td><a href="funcoes.php?excluir='.$row['numeroConteiner'].'">Excluir</a></td>';  
                        echo '</tr>';
                    echo '</tbody>';      
                }
                echo '</table>';
            echo '</div>'; 
        }
        else {
            echo 'Cadastre seus contêiner eles seram listados aqui!';
            //mysqli_connect_error();
        }      
    }

    function selecionarConteiner(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "T2S";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die(mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM conteiner WHERE numeroConteiner ='".$_GET['atualizar']."'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        echo 
        '
            <form action="funcoes.php" method="post">
                <label for="">Número do contêiner:</label>
                <input value="'.$row['numeroConteiner'].'" disabled>
                <input type="hidden" name="numeroConteiner" value="'.$row['numeroConteiner'].'">
                

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
        ';
    }
?>

