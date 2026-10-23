<?php
$price = 100;
$tax = 21;
$total = $price + ($price * $tax / 100);
echo "Price: $price EUR<br>";
echo "Tax: $tax%<br>";
echo "Total: $total EUR<br>";
