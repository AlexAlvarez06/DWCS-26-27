<?php
$products = [
    [
        "name" => "Keyboard",
        "price" => 25
    ],
    [
        "name" => "Mouse",
        "price" => 15
    ],
    [
        "name" => "Monitor",
        "price" => 180
    ],
    [
        "name" => "Webcam",
        "price" => 45
    ]
];
$total = 0;
foreach ($products as $product) {
    $total += $product["price"];
}
echo "Total: $total EUR";
