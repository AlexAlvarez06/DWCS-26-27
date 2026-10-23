<?php
echo "<pre>";
echo "<b>" . str_pad("X", 4, " ", STR_PAD_BOTH) . "</b> | ";
for ($k = 1; $k <= 12; $k++) {
    echo "<b>" . str_pad($k, 4, " ", STR_PAD_BOTH) . "</b> | ";
}
echo "<br><br>";

for ($i = 1; $i <= 12; $i++) {
    echo "<b>" . str_pad($i, 4, " ", STR_PAD_BOTH) . "</b> | ";
    for ($j = 1; $j <= 12; $j++) {
        $resultado = $i * $j;
        $numeroAlineado = str_pad($resultado, 4, " ", STR_PAD_BOTH);
        echo $numeroAlineado . " | ";
    }
    echo "<br><br>";
}
echo "<pre>";
