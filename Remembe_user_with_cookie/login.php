<?php
$cookie_name = "user_login";
$usuario = "";

if (isset($_REQUEST["usrname"])) {
    $usuario = $_REQUEST["usrname"];
}

if (isset($_REQUEST["remember"]) and isset($_REQUEST["usrname"])) {
    if ($_REQUEST["remember"] == "on") {
        $cookie_value = $_REQUEST["usrname"];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/6/w3.css">
</head>

<body class="w3-light-grey">
    <div class="w3-content w3-padding-64">
        <div class="w3-card w3-white w3-padding w3-center">
            <h2>Bienvenido, <?php echo htmlspecialchars($usuario); ?></h2>

            <?php if (isset($_REQUEST["remember"])) { ?>
                <p>Te recordaremos la próxima vez que entres.</p>
            <?php } else { ?>
                <p>No has marcado "Remember me", así que no guardaremos tu usuario.</p>
            <?php } ?>

            <p>
                <a href="form_modal.php" class="w3-button w3-green">Volver al login</a>
            </p>
        </div>
    </div>
</body>

</html>