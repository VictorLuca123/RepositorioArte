<?php
    include 'menu.php';
    $obras = file_exists("obras.json") ? json_decode(file_get_contents("obras.json"), true) : [];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">

    <form action="filtro.php" method="get">
        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo">
            <option value="">Todos</option>
            <option value="Renascimento">Renascimento</option>
            <option value="Modernismo">Modernismo</option>
            <option value="Pós-Impressionismo">Pós-Impressionismo</option>
        </select>
        <br>
        <button type="submit">Filtrar</button>
    </form>
</head>
<body>
    <?php foreach ($obras as $obra) { ?>
        <div class="obra">
            <img src="<?= htmlspecialchars($obra["imagem"]) ?>" alt="<?= htmlspecialchars($obra["titulo"]) ?>">
            <h2><?php echo $obra['titulo']; ?></h2>
            <p>Categoria: <?php echo $obra['categoria']; ?></p>
            <p>Tipo: <?php echo $obra['tipo']; ?></p>
            <a href="detalhe.php?id=<?php echo $obra['id']; ?>">
            <button class="botao">Ver mais</button>
            </a>
        </div>
    <?php } ?>
</body>
</html>