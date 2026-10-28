<?php
$errores = [];
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"]);
    if (empty($titulo)) {
        $errores[] = "Pon un título a la imagen";
    }
    $nombre = $_FILES["imagen"]["name"];
    $error = $_FILES["imagen"]["error"];
    $tmp_name = $_FILES["imagen"]["tmp_name"];
    $trozos = explode(".", $nombre);
    $extension = strtolower($trozos[count($trozos) - 1]);
    $permitidas = ["jpg", "jpeg", "png", "gif", "webp"];

    if ($error != 0) {
        $errores[] = "Error al subir el archivo";
    } else if (!in_array($extension, $permitidas)) {
        $errores[] = "Extensión de archivo no válida";
    }
    if (empty($errores)) {
        if (move_uploaded_file($tmp_name, "images/" . $nombre)) {
            file_put_contents("data/fotos.txt", $nombre . "|" . $titulo . "\n", FILE_APPEND);
            header("Location: index.php?ok=1"
            );
            exit;
        } else {
            $errores[] = "No se pudo guardar la imagen";
        }
    }
}

if (isset($_GET["ok"])) {
    $mensaje = "Foto subida correctamente";
}

if (file_exists("data/fotos.txt")) {
    $contenido = file("data/fotos.txt", FILE_IGNORE_NEW_LINES);
} else {
    $contenido = [];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo album</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/6/w3.css">
</head>

<body class="w3-light-grey">
    <div class="w3-container w3-teal w3-padding-16">
        <h1>Mi álbum de fotos</h1>
    </div>

    <div class="w3-content w3-padding">

        <div class="w3-card w3-white w3-padding w3-margin-top w3-margin-bottom">
            <h3>Subir foto</h3>
            <form method="post" action="" enctype="multipart/form-data">
                <p>
                    <label for="titulo">Título</label>
                    <input class="w3-input w3-border" type="text" id="titulo" name="titulo">
                </p>
                <p>
                    <label for="imagen">Imagen</label>
                    <input class="w3-input w3-border" type="file" id="imagen" name="imagen">
                </p>
                <p>
                    <input class="w3-button w3-teal" type="submit" value="Subir">
                </p>
            </form>
        </div>

        <?php if (!empty($errores)) { ?>
            <div class="w3-panel w3-red">
                <?php foreach ($errores as $error) { ?>
                    <p><?php echo $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($mensaje != "") { ?>
            <div class="w3-panel w3-green">
                <p><?php echo $mensaje; ?></p>
            </div>
        <?php } ?>

        <?php if (empty($contenido)) { ?>
            <p>Todavía no hay fotos en el álbum.</p>
        <?php } ?>

        <div class="w3-row-padding">
            <?php foreach ($contenido as $linea) {
                $partes = explode("|", $linea);
                $imagen = $partes[0];
                $titulo = $partes[1]; ?>
                <div class="w3-third w3-margin-bottom">
                    <div class="w3-card w3-white">
                        <img src="images/<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($titulo); ?>" style="width:100%;height:250px;object-fit:cover">
                        <div class="w3-container w3-center">
                            <h4><?php echo htmlspecialchars($titulo); ?></h4>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</body>

</html>