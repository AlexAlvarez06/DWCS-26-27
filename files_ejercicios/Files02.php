<?php
$nombreUsuario = "";
$password = "";
$acceso = null;
$usuarios = file("data/usuarios.txt", FILE_IGNORE_NEW_LINES);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreUsuario = $_POST["usuario"];
    $password = $_POST["password"];
    foreach ($usuarios as $linea) {
        $partes = explode(":", $linea);
        $usuarioArchivo = trim($partes[0]);
        $passwordArchivo = trim($partes[1]);
        var_dump($usuarioArchivo, $passwordArchivo);
        if ($nombreUsuario === $usuarioArchivo && $password === $passwordArchivo) {
            $acceso = true;
            break;
        } else {
            $acceso = false;
        }
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <?php
    include "menu.html";
    ?>
    <h1>LOGIN</h1>
    <form method="post" action="">
        <p>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($nombreUsuario) ?>">
        </p>
        <p>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
        </p>
        <p>
            <input type="submit" value="Iniciar Sesion">
        </p>
    </form>
    <pre>
        <?php
        if ($acceso === true) {
            echo "Bienvenido!";
        } elseif ($acceso === false) {
            echo "Usuario o contraseña no validos";
        }
        ?>
    </pre>

</body>

</html>