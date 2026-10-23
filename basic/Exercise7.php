<?php
$numero = 100;

$resultadoFor = 1;
$resultadoWhile = 1;
$resultadoDo = 1;

for ($i = 1; $i <= $numero; $i++) {
    $resultadoFor *= $i;
}
echo "Resultado con for: " . $resultadoFor . "<br>";

$a = 1;
while ($a <= $numero) {
    $resultadoWhile *= $a;
    $a++;
}
echo "Resultado con for: " . $resultadoWhile . "<br>";

$b = 1;
do {
    $resultadoDo *= $b;
    $b++;
} while ($b <= $numero);
echo "Resultado con for: " . $resultadoDo . "<br>";
