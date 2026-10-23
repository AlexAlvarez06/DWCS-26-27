<?php
$numbers = range(1, 100);
foreach ($numbers as $number) {
    $square = $number * $number;
    echo "$number -> $square<br>";
}
