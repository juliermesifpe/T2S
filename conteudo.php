<?php
    $sql = "CREATE TABLE IF NOT EXISTS movimentacao (
        id_movimentacao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        tipo_movimentacao VARCHAR(50) NOT NULL,
        data_inicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        data_fim TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        fk_numero_conteiner VARCHAR(11) NOT NULL,
        FOREIGN KEY (fk_numero_conteiner) REFERENCES conteiner (numero_conteiner)
    )";   
?>

               
                
              
                

               
          