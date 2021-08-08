<?php
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
            //header('Location: index.php?index=Sucesso na criação bando de dados!');
        }
        else {
            header('Location: index.php?index=Erro na criação do banco de dados!');
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
            //header('Location: index.php?index=Sucesso na criação da tabela conteiner!');
        } 
        else {
            header('Location: index.php?index=Erro na criação tabela conteiner!');
             //mysqli_connect_error();
        }

        $sql = "CREATE TABLE IF NOT EXISTS movimentacao (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            tipoMovimentacao VARCHAR(50) NOT NULL,
            dataInicio TIMESTAMP NOT NULL,
            dataFim TIMESTAMP NOT NULL,
            fkNumeroConteiner VARCHAR(11) NOT NULL,
            FOREIGN KEY (fkNumeroConteiner) REFERENCES conteiner (numeroConteiner)
        )";
            
        if (mysqli_query($conn, $sql)) {
            //header('Location: index.php?index=Sucesso criação de tabela movimentacao!');
        } 
        else {
            header('Location: index.php?index=Erro criação da tabela movimentacao!');
            //mysqli_connect_error();
        }
        mysqli_close($conn);
    }

    function incluirConteiner(){
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

        $sql = "INSERT INTO conteiner (numeroConteiner, cliente, tipo, `status`, categoria )
        VALUES ('$numeroConteiner', '$cliente', '$tipo', '$status', '$categoria')";
    
        if (mysqli_query($conn, $sql)) {
            header('Location: index.php?index=Inclusão realizado com sucesso!');
        } else {
            header('Location: index.php?index=Inclusão não realizado!');
            //mysqli_connect_error();
        }
        mysqli_close($conn);
    }

       
    
?>

