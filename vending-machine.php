<?php

// insert coins
// choose product
//
// product has price
// we give 5 eur
// we have to get remainder back in 'monetas' - starting from the biggest
//
// 40 min time
// extra --
//
// use objects (arrays)

$products = [
    ['Hot Chocolate', 160],
    ['Cappuccino', 180],
    ['Tea', 120]
];

echo "Please choose your product by entering a number!\n";

$productCount = 0;

foreach ($products as $product) {
    $productCost = $product[1] / 100;
    $productCount++;
    echo "{$productCount} - {$product[0]} (\${$productCost})\n";
}
$userChoice = (int)readline();

switch ($userChoice) {
    case 1:
        break;

}