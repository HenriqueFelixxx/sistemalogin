<?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
    $mysqli = require __DIR__ . "/database.php";
    $email = $_POST["email"];

    $sql = sprintf("SELECT * FROM usuarios WHERE email = '%s'", $email);
    $resultado = $mysqli->query($sql);

    $usuario = $resultado->fetch_assoc();
    if($usuario){
        if(password_verify($_POST["senha"], $usuario["senha"])){
            echo "<h1 style = 'color : green'>login concluido</h1>";
        }
        else{
            echo "<h1 style = 'color : red'>senha incorreta</h1>";
        }
    }
    else{
        echo "<h1 style = 'color : red'>usuario nao existe</h1>";
    }
    }
?>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
</head>
<body>
    
    <h1>Login</h1>
    <form method = "post">
        <label for="email">Email</label>
        <input type="email" name = "email" id = "email">
        <label for="senha">Senha</label>
        <input type="password" name = "senha" id = "senha">
        <button>Entrar</button>
    </form>
</body>
</html>