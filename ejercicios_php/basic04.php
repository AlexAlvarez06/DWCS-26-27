<?php
$nombre = "";
$apellidos = "";
$DNI = "";
$edad = "";
$email = "";
$genero = "";
$errores = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $DNI = trim($_POST["dni"]);
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $genero = $_POST["genero"] ?? "";


    if (empty(trim($nombre))) {
        $errores[] = "Campo nombre vacio";
    }
    if (empty(trim($DNI))) {
        $errores[] = "Campo dni vacio";
    } elseif (strlen($DNI) !== 9 || !ctype_digit(substr($DNI, 0, 8)) || !ctype_alpha(substr($DNI, 8, 1))) {
        $errores[] = "Formato de DNI no valido";
    } elseif (strtoupper(substr($DNI, 8, 1)) !== substr("TRWAGMYFPDXBNJZSQVHLCKE", intval(substr($DNI, 0, 8)) % 23, 1)) {
        $errores[] = "Letra del dni no valida";
    }
    if (!ctype_digit($edad) || 18 > $edad || $edad > 150) {
        $errores[] = "Edad no valida";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "formato de email no valido";
    }
    if (empty($errores)) {
        header("Location:https://biwenger.as.com/");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de datos personales</title>
</head>

<body>
    <h1>Datos personales</h1>

    <form method="post" action="">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
        </p>
        <p>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo htmlspecialchars($apellidos); ?>">
        </p>
        <p>
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" value="<?php echo htmlspecialchars($DNI); ?>">
        </p>
        <p>
            <label for="edad">Edad:</label>
            <input type="text" id="edad" name="edad" value="<?php echo htmlspecialchars($edad); ?>">
        </p>
        <p>
            Género:
            <input type="radio" id="hombre" name="genero" value="hombre" <?php echo ($genero == "hombre") ? "checked" : ""; ?>>
            <label for="hombre">Hombre</label>
            <input type="radio" id="mujer" name="genero" value="mujer" <?php echo ($genero == "mujer") ? "checked" : ""; ?>>
            <label for="mujer">Mujer</label>
            <input type="radio" id="otro" name="genero" value="otro" <?php echo ($genero == "otro") ? "checked" : ""; ?>>
            <label for="otro">Otro</label>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        </p>
        <p>
            <input type="submit" value="Enviar">
        </p>
    </form>
    <?php
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
    ?>

</body>

</html>