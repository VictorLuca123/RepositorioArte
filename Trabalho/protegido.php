<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>dashboar do usuario</title>

</head>

<?php 
    session_start();

    $usuario = $_SESSION["usuario"] ?? null;

    if(is_null($usuario)){
        // echo "<h4>Fazer Login</h4>";
        header("Location: login.php");
    }else{
        echo "<h2>Bem Vindo! $usuario</h2>";
    }
?>

<a href="index.php" class="btn-index">Inicio</a>

<header>
    <h3>Cadestre a sua Obra Favorita aqui</h3>
</header>

<!-- Lida com formulário -->
<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST["titulo"] ?? "";
    $artista = $_POST["artista"] ?? "";
    $categoria = $_POST["categoria"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    $imagem = $_POST["imagem"] ?? "";
    $descricao = $_POST["descricao"] ?? "";

    $obras = file_exists("obras.json") ? json_decode(file_get_contents("obras.json"), true) : [];

    $obras[] = [
        "id" => uniqid(),
        "titulo" => $titulo,
        "artista" => $artista,
        "categoria" => $categoria,
        "tipo" => $tipo,
        "imagem" => $imagem,
        "descricao" => $descricao,
    ];

    file_put_contents("obras.json", json_encode($obras, JSON_PRETTY_PRINT));

    echo "<p>Obra cadastrada com sucesso!</p>";
}
?>
<body>
<div class= "protegido">
    <form method="post">
    Nome da obra: <input type="text" name="titulo" required><br><br>
    Artista: <input type="text" name="artista" required><br><br>
    Tipo: <input type="text" name="tipo" required><br><br>
    URL da imagem: <input type="url" name="imagem" required><br><br>
    Descrição: <textarea name="descricao" required></textarea><br><br>
    <input type="submit" value="Cadastrar obra">
    </form>
</div>
    <div><a href="logout.php" class="btn-logout">Logout</a></div>
</body>
</html>