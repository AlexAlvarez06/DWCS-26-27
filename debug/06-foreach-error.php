<?php
$prices = [10, 20, 30, 40];
$total = 0;
foreach ($prices as $price) {
    $total += $price;
}
echo "Total: $total EUR";
