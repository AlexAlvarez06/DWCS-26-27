<?php
function calculateDiscount($price, $discount)
{
    return $price * $discount / 100;
}
function calculateTotal($price, $discount)
{
    $discountAmount = calculateDiscount($price, $discount);
    $total = $price - $discountAmount;
    return $total;
}
$products = [
    [
        "name" => "Keyboard",
        "price" => 50,
        "discount" => 10
    ],
    [
        "name" => "Mouse",
        "price" => 30,
        "discount" => 20
    ],
    [
        "name" => "Monitor",
        "price" => 200,
        "discount" => 15
    ]
];
$totalPurchase = 0;
foreach ($products as $product) {
    $productTotal = calculateTotal(
        $product["price"],
        $product["discount"]
    );
    $totalPurchase += $productTotal;
}
echo "Total purchase: $totalPurchase EUR";
