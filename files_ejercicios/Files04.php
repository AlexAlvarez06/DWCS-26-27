<?php
$errores = [];
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_FILES["imagen"]["name"];
    $error = $_FILES["imagen"]["error"];
    $tmp_name = $_FILES["imagen"]["tmp_name"];
    $trozos = explode(".", $nombre);
    $extension = strtolower($trozos[count($trozos) - 1]);
    $permitidas = ["jpg", "jpeg", "png", "gif", "webp"];

    if ($error != 0) {
        $errores[] =  "error al subir el archivo";
    } else if (!in_array($extension, $permitidas)) {
        $errores[] = "extension de archivo no valida";
    }
    if (empty($errores)) {
        if (move_uploaded_file($tmp_name, "images/" . $nombre)) {
            $mensaje = "se ha movido correctamente";
        } else {
            $errores[] = "no se pudo guardar la imagen";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
</head>

<body>
    <?php include "menu.html"; ?>

    <h2>Subir imagen</h2>

    <form method="post" action="" enctype="multipart/form-data">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen">
        <br><br>
        <input type="submit" value="Subir">
    </form>
    <?php
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
    echo $mensaje;
    ?>
</body>

</html>