<?php
function calculateTax($price)
{
    $tax = $price * 0.21;
    return $tax;
}
function calculateTotal($price)
{
    $tax = calculateTax($price);
    return $price + $tax;
}
$price = 100;
$total = calculateTotal($price);
echo "Price: $price EUR<br>";
echo "Total: $total EUR<br>";
