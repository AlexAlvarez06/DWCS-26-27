<!DOCTYPE html>

<body>
    <?php
    $fechaNac = new DateTime($_POST["fechaNacimiento"]);
    $hoy = new DateTime();
    $edad = $hoy->diff($fechaNac);
    ?>
    Tu fecha de nacimiento es: <?php echo $_POST["fechaNacimiento"] ?> <br>
    Tu edad es: <?php echo $edad->y ?>
</body>

</html>