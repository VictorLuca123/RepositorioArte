<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Login Arte</title>
</head>
<body>

<div class="login-bonito">
    <h2>Login</h2>
    <form action="" method="post">
        Usuario: <input type="text" name="usuario">
        Senha: <input type="password" name="senha">
        <input type="submit" value="Fazer Login">
    </form>
</div>

<?php
    session_start();
    $usuario = $_SESSION["usuario"] ?? null;

    if(!is_null($usuario)){
        header("Location: protegido.php");
    }  

    $usuario = $_POST["usuario"] ?? null;
    $senha = $_POST["senha"] ?? null;

    if(!is_null($usuario) && !is_null($senha)){
       
        if($usuario === "admin" && $senha === "123"){
         // echo "<h4>bem vindo</h4>";    
            
            $_SESSION["usuario"] = $usuario;
            header("Location: protegido.php");
        }else{
            echo "<h4>Usuário ou senha não existe, tente novamente!</h4>";
        }

    }else{}
?>
</body>
</html>