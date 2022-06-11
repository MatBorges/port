<?php
    $usuario = 'root';
    $senha = '';
    $banco = 'portifolio';
    $host = 'localhost';

    $mysqli = new mysqli($host, $usuario, $senha, $banco);

    if($mysqli->error){
        die("Falha ao conectar: ". $$mysqli->error);
    }
?>