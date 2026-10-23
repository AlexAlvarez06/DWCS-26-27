<!DOCTYPE html>

<body>
    Welcome <?php echo $_GET["name"]; ?>!<br>
    Your email address is: <?php echo $_GET["email"]; ?><br>
    La suma de los numeros es: <?php echo $_GET["numero1"] + $_GET["numero2"] ?><br>
    La suma de las dos cadenas: <?php echo $_GET["cadena1"] . ", " . $_GET["cadena2"] ?>
</body>

</html>