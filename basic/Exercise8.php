<?php
$students = [
    "Ares" => 0.5,
    "Alex" => 9.8,
    "El Pepe" => 6,
    "Mariano Diaz" => 7,
    "Mbappe" => 1,
    "Vinicius" => 0
];
$media = 0;
$contador = 0;
$max = [
    "nombre" => "",
    "nota" => -1
];
$suspensos = 0;

foreach ($students as $nombre => $nota) {
    echo "Nombre: " . $nombre . " => " . "Nota: " . $nota . "<br>";
    $media += $nota;
    $contador++;
    if ($nota > $max["nota"]) {
        $max = ["nombre" => $nombre, "nota" => $nota];
    }
    if ($nota < 5) {
        $suspensos++;
    }
}
echo "La media es de: " . ($media / $contador) . "<br>";
echo "La nota mas alta es de " . $max["nombre"] . " con un:" . $max["nota"] . "<br>";
echo "El numero de suspensos es de: " . $suspensos;
