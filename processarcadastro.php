<?php

if (empty($_POST["nome"])) {
    die("Insira um nome");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Insira um email valido");
}




if ($_POST["senha"] !== $_POST["senha_confirm"]) {
    die("Senhas nao conferem");
}

$password_hash = password_hash($_POST["senha"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO usuarios (nome, email, senha)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["nome"],
                  $_POST["email"],
                  $password_hash);
                  
$stmt->execute();
header("location: loginsucesso.html");
exit;




