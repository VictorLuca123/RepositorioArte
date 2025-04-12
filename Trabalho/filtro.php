<?php
include 'menu.php';
$obras = file_exists("obras.json") ? json_decode(file_get_contents("obras.json"), true) : [];

$tipo = $_GET['tipo'] ?? null;

$obrasFiltradas = $obras;
if ($tipo) {
    $obrasFiltradas = array_filter($obrasFiltradas, function ($obra) use ($tipo) {
        return $obra['tipo'] == $tipo;
    });
}
?>

<div class="obra-container">
    <?php foreach ($obrasFiltradas as $obra) { ?>
        <div>
            <img src="<?= htmlspecialchars($obra["imagem"]) ?>" alt="<?= htmlspecialchars($obra["titulo"]) ?>">
            <h2><?php echo $obra['titulo']; ?></h2>
            <p>Categoria: <?php echo $obra['categoria']; ?></p>
            <p>Tipo: <?php echo $obra['tipo']; ?></p>
        </div>
    <?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="filtro.css">
    <title>Document</title>
</head>
<body>
</body>
</html>


