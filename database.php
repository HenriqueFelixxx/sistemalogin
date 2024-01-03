<?php

$host = "localhost";
$bd_nome = "login";
$usuario = "root";
$senha = "";

$mysqli = new mysqli(hostname: $host,
                     username: $usuario,
                     password: $senha,
                     database: $bd_nome);
                     
if ($mysqli->connect_errno) {
    die("Erro de conexao: " . $mysqli->connect_error);
}

return $mysqli;