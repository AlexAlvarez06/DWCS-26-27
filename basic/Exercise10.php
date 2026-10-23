<?php
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];

$familiaNavegador = "Desconocido u otro navegador";
if (strpos($userAgent, 'Firefox') !== false) {
    $familiaNavegador = 'Mozilla Firefox';
} elseif (strpos($userAgent, 'Edg') !== false || strpos($userAgent, 'Edge') !== false) {
    $familiaNavegador = 'Microsoft Edge';
} elseif (strpos($userAgent, 'Chrome') !== false) {
    $familiaNavegador = 'Google Chrome';
} elseif (strpos($userAgent, 'Safari') !== false) {
    $familiaNavegador = 'Apple Safari';
}

echo "Información de tu conexión: <br>";
echo "Tu IP remota es: " . $ip . "<br>";
echo "Familia del navegador: " . $familiaNavegador . "<br>";
echo "Información completa: <br>" . $userAgent;
