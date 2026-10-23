<?php
$cadena1 = "Cadena mas largaa";
$cadena2 = "cadena del medio";
$cadena3 = "cadena corta";
$lista = [$cadena1, $cadena2, $cadena3];

usort($lista, function ($a, $b) {
    return strlen($a) - strlen($b);
})
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo implode(", ", $lista);
    ?>
</body>

</html>