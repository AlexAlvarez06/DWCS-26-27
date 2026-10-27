<?php
$url = "";
$errores = [];
$textos = [];
$enlaces = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = $_POST["url"];
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errores[] = "URL no valida";
    }

    if (empty($errores)) {
        $contenido = file_get_contents($url);
        if ($contenido === false) {
            $errores[] = "No se pudo leer la página";
        } else {
            $trozos = explode("<a ", $contenido);

            foreach ($trozos as $i => $trozo) {
                if ($i == 0) {
                    continue;
                }
                if (strpos($trozo, "href=") !== false) {
                    $posHref = strpos($trozo, "href=");
                    $comilla = substr($trozo, $posHref + 5, 1);
                    $posComilla = $posHref + 5;
                    $inicio = $posComilla + 1;
                    $fin = strpos($trozo, $comilla, $inicio);
                    $enlace = substr($trozo, $inicio, $fin - $inicio);
                    $enlaces[] = $enlace;

                    $texto = "";
                    $inicioTexto = strpos($trozo, ">", $fin + 1) + 1;
                    $finTexto = strpos($trozo, "</a>", $inicioTexto);
                    if ($finTexto !== false) {
                        $texto = substr($trozo, $inicioTexto, $finTexto - $inicioTexto);
                        $texto = trim(strip_tags($texto));
                    }
                    $textos[] = $texto;
                }
            }
        }
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
    <?php
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
    ?>
    <?php if (!empty($enlaces)) { ?>
        <table border="1">
            <tr>
                <th>Texto</th>
                <th>Enlace</th>
            </tr>
            <?php foreach ($enlaces as $i => $enlace) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($textos[$i]); ?></td>
                    <td><?php echo htmlspecialchars($enlace); ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
</body>

</html>