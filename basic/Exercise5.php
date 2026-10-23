<?php
$fechaNac = "18-02-2006";
$hoy = date("d-m-Y");
$objetoFechaNac = date_create($fechaNac);
$objetoHoy = date_create($hoy);
$diferencia = date_diff($objetoFechaNac, $objetoHoy);
echo "Tienes " . $diferencia->format("%y") . " años";
