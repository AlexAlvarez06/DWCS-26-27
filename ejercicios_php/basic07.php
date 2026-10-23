<?php
$minuto = "";
$segundo = "";
$pelicula = "";
$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $minuto = $_POST["minuto"];
    $segundo = $_POST["segundo"];
    $pelicula = $_POST["pelicula"];


    if (!ctype_digit($segundo) || $segundo > 59) {
        $errores[] = "segundo no valido";
    }
    if (!ctype_digit($minuto)) {
        $errores[] = "minuto no valido";
    }

    if (empty($errores)) {
        $segundos = $minuto * 60 + $segundo;
        header("Location:" . $pelicula . "?t=" . $segundos);
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ver película desde un minuto</title>
</head>

<body>
    <h1>Ver película en YouTube</h1>

    <form method="post" action="">
        <p>
            <label for="pelicula">Película:</label>
            <select id="pelicula" name="pelicula">
                <option value="https://youtu.be/hKOiC6maP2c">Sempre Xonxa</option>
                <option value="https://youtu.be/Wekf3PRaR6E">A esmorga</option>
            </select>
        </p>
        <p>
            <label for="minuto">Minuto:</label>
            <input type="text" id="minuto" name="minuto" value="<?php echo htmlspecialchars($minuto); ?>">
        </p>
        <p>
            <label for="segundo">Segundo:</label>
            <input type="text" id="segundo" name="segundo" value="<?php echo htmlspecialchars($segundo); ?>">
        </p>
        <p>
            <input type="submit" value="Ver">
        </p>
    </form>
    <?php
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
    ?>
</body>

</html>