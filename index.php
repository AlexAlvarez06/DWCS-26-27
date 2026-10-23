<?php
$variable = "Hola";
xdebug_break();  // <--- Esto obliga a Xdebug a detenerse aquí
echo $variable;
phpinfo();
?>