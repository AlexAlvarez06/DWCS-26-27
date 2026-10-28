<?php
$contenido = scandir("images");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php include "menu.html"; ?>

    <h2>Galería de imágenes</h2>

    <?php foreach ($contenido as $imagen) {

        if ($imagen == "." || $imagen == "..") {
            continue;
        } ?>
        <img src="images/<?php echo htmlspecialchars($imagen); ?>" width="200" alt="<?php echo htmlspecialchars($imagen); ?>">
    <?php } ?>

</body>

</html>