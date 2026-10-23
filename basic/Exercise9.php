<?php
$estudiantes = [
    ["nombre" => "Ares", "nota" => 0.5],
    ["nombre" => "El Pepe", "nota" => 6],
    ["nombre" => "Mariano Diaz", "nota" => 7],
    ["nombre" => "Mbappe", "nota" => 1],
    ["nombre" => "Alex", "nota" => 9.8],
    ["nombre" => "Vinicius", "nota" => 0]
];
usort($estudiantes, function ($a, $b) {
    return $a["nombre"] <=> $b["nombre"];
});
echo "Alumnos ordenados alfabeticamente: <br>";
foreach ($estudiantes as $alumno) {
    echo $alumno["nombre"] . "<br>";
}
echo "<br>";
usort($estudiantes, function ($a, $b) {
    return $b["nota"] <=> $a["nota"];
});
echo "Alumnos ordenados por nota descendente: <br>";
foreach ($estudiantes as $alumno) {
    echo $alumno["nombre"] . " => " . $alumno["nota"] . "<br>";
}
