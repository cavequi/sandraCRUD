<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "12345678";
    $banco = "dbprojeto34002";

    $cmd = new PDO(dsn: "mysql:host=$servidor; dbname=$banco", username: $usuario, password: $senha);
?>