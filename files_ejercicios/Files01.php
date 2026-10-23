<?php
date_default_timezone_set("Europe/Madrid");
$fechaHora = date("d-m-Y H:i:s");
$IP = $_SERVER["REMOTE_ADDR"];
$agente = $_SERVER["HTTP_USER_AGENT"];

if (str_contains($agente, 'Firefox')) {
    $navegador = "Firefox";
} elseif (str_contains($agente, 'Edg/')) {
    $navegador = "Edge";
} elseif (str_contains($agente, 'Chrome')) {
    $navegador = "Chrome";
} elseif (str_contains($agente, 'Safari')) {
    $navegador = "Safari";
} else {
    $navegador = "Otro";
}
file_put_contents("data/log.txt", "Fecha y hora: " . $fechaHora . ", IP: " . $IP . ", agente: " . $navegador . "\n", FILE_APPEND);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>

</head>

<body>
    <?php
    include "menu.html";
    ?>
    <h1>Bienvenido</h1>
    <?php
    echo $fechaHora . "<br>" . $IP . "<br>" . $navegador;
    ?>

</body>

</html>