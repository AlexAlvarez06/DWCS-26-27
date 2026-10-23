<?php
$fechaNac = "25-11-2005";
$hoy = date("d-m-Y");
$objetoFechaNac = date_create($fechaNac);
$objetoHoy = date_create($hoy);

$edad = date_diff($objetoFechaNac, $objetoHoy);
echo "Tienes " . $edad->format("%y") . " años <br>";

$cumpleaños = "25-11-" . ($objetoHoy->format("Y"));
$objetoCumpleaños = date_create($cumpleaños);

if ($objetoCumpleaños < $objetoHoy) {
    date_modify($objetoCumpleaños, "+1 year");
}
$cuantoFalta = date_diff($objetoCumpleaños, $objetoHoy);
echo "Te faltan " . $cuantoFalta->format("%m") . " meses y " . $cuantoFalta->format("%d") . " dias para que cumplas años.";
