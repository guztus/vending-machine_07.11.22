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
    ['Hot Chocolate', 121],
    ['Cappuccino', 180],
    ['Tea', 120]
];

$coinValues = [
  200, 100, 50, 20, 10, 5, 2, 1,
];


while (true) {

    echo "Please choose your product by entering a number!\n";

    $productCount = 0;

    foreach ($products as $product) {
        $productCost = $product[1] / 100;
        $productCount++;
        echo "{$productCount} - {$product[0]} (\${$productCost})\n";
    }

    $userChoice = (int) readline();

//    make cases for if userChoice is not an int

    $userCash = 500;

    $remainder = 0;


    $productKeys = array_keys($products);

    $productFound = 0;
    foreach ($productKeys as $productKey) {
        if ($userChoice == $productKey + 1) {
            $remainder = $userCash - $products[$productKey][1];
            echo "Chosen product is {$products[$productKey][0]}\n";
            $productFound++;
            break;
        }
    }

    if ($productFound == 0) {
        continue;
    }


    $outputMoney = '';
    $outputMoneyTEST = 0;

    while ($remainder > 0) {
        for ($i = 0; $i < count($coinValues); $i++)
        if ($remainder - $coinValues[$i] >= 0) {
            $remainder -= $coinValues[$i];

            $remainderInCash = ($coinValues[$i] / 100);

            $outputMoney .= "\${$remainderInCash} ";

            $outputMoneyTEST += $coinValues[$i];
        }
    }

    echo "Output: {$outputMoney}";

    exit;
}