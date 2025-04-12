<?php
$obras = file_exists("obras.json") ? json_decode(file_get_contents("obras.json"), true) : [];

$id = $_GET['id'] ?? 0;
$obraEncontrada = null;

foreach ($obras as $obra) {
    if ($obra['id'] == $id) {
        $obraEncontrada = $obra;
        break;
    }
}

if (!$obraEncontrada) die("Obra não encontrada");
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="detalhe.css">
    <title>Detalhes da Obra</title>

</head>
<body>

<h1>Detalhes da Obra</h1>

<div>
<img src="<?= htmlspecialchars($obra["imagem"]) ?>" alt="<?= htmlspecialchars($obra["titulo"]) ?>">
    <h2><?php echo $obra['titulo']; ?></h2>
    <p>Categoria: <?php echo $obra['categoria']; ?></p>
    <p>Tipo: <?php echo $obra['tipo']; ?></p>
    <p><?php echo $obra['descricao']; ?></p>
</div>

    <div><a href="index.php" class="btn-index">Inicio</a></div>
    
</body>
</html>


