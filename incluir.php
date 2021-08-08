<?php
    include "funcoes.php";

    if(
        !empty($_POST['numeroConteiner'])&&
        !empty($_POST['cliente'])&&
        !empty($_POST['tipo'])&&
        !empty($_POST['status'])&&
        !empty($_POST['categoria'])
    )
    {   
        criarBanco();
        criarTabelas();
        incluirConteiner();
    }else{
        header('Location: index.php?index=Preencha todos os campos!');
    }
?>