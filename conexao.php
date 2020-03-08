

<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "root";
    $dbname = "cadastrousuarios";


    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    if(!$conn) {
        die ('Falha ao conectar ao banco de dados: ' . mysqli_connect_error());
    }    
?>