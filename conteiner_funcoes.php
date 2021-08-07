<?php
    function conteiner_incluir(){
        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbname = "operacoes";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $numero_conteiner = $_POST['numero_conteiner'];
        $cliente = $_POST['cliente'];
        $tipo = $_POST['tipo'];
        $status = $_POST['status'];
        $categoria = $_POST['categoria'];
        
        $sql = "INSERT INTO conteiner (numero_conteiner, cliente,  tipo, 'status', categoria)
        VALUES ('$numero_conteiner', '$cliente', '$tipo', '$status', '$categoria')";
    
        if (mysqli_query($conn, $sql)) {
            header('Location: index.php?index=Cadastro realizado com sucesso!');
        } else {
            header('Location: index.php?index=Cadastro não realizado!');
        }
        mysqli_close($conn);
    }
?>