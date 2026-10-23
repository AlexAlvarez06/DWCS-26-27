<?php
$url = "";
$errores = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST["url"];
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errores[] = "URL no valida";
    }

    if (empty($errores)) {
        $lineas = file($url);
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>

<body>
    <?php include "menu.html"; ?>
    <h2>Analizador de enlaces</h2>
    <form method="post" action="">
        <label for="url">URL:</label>
        <input type="text" name="url" id="url">
        <br><br>
        <input type="submit" value="ENVIAR">
    </form>
</body>

</html>