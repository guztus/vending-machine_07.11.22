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

// 1.
// User can input money until they can pay for it
// Check if input is valid
//
// 2.
// Cash value count in machine

$products = [
    ['name' => 'Hot Chocolate', 'cost' => 121],
    ['name' => 'Cappuccino', 'cost' => 180],
    ['name' => 'Tea', 'cost' => 120]
];

$coins = [
    ['value' => 200, 'count' => 50],
    ['value' => 100, 'count' => 51],
    ['value' => 50, 'count' => 52],
    ['value' => 20, 'count' => 53],
    ['value' => 10, 'count' => 54],
    ['value' => 5, 'count' => 55],
    ['value' => 2, 'count' => 0],
    ['value' => 1, 'count' => 50],
];


while (true) {

    echo "Please choose your product by entering a number!\n";

    $productCount = 0;

    foreach ($products as $product) {
        $productCost = $product['cost'] / 100;
        $productCount++;
        echo "{$productCount} - {$product['name']} (\${$productCost})\n";
    }

    $userChoice = (int)readline();

//    make cases for if userChoice is not an int

    $userCash = 0;

    $remainder = 0;

    $productKeys = array_keys($products);


    $productFound = 0;
    $productChosen = 0;
    foreach ($productKeys as $productKey) {
        if ($userChoice == $productKey + 1) {
            $remainder = $userCash - $products[$productKey]['cost'];
            echo "Chosen product is {$products[$productKey]['name']}\n";
            $productFound++;

            $productChosen = $productKey;
            break;
        }
    }

    $remainder = abs($remainder);


    if ($productFound == 0) {
        continue;
    }

    $inputCoinsInWords = '';

    while ($userCash < $products[$productChosen]['cost']) {

        echo "Please enter coins! :)\n";
        $userInputCoins = (int)readline();

        $coinKeys = array_keys($coins);

        $coinIsValid = 0;
        $coinChosenId = 0;
        foreach ($coinKeys as $coinKey) {
            if ($userInputCoins == $coins[$coinKey]['value']) {

                $coinIsValid++;

                $coinChosenId = $coinKey - 1;
                break;
            }

        }

        if ($coinIsValid == 1) {
            $userCash += $userInputCoins;

            $userInputInCorrectValue = ($userInputCoins / 100);
            $inputCoinsInWords .= " \${$userInputInCorrectValue}";
            $coins[$coinChosenId]['count']++;
        }

        echo "---- ----\n";
        echo "You have input -{$inputCoinsInWords}\n";
        echo "---- ----\n";
    }

    $remainder = $userCash - $remainder;

    $outputMoney = '';
    $outputMoneyTEST = 0;
    echo $remainder;

    while ($remainder > 0) {
        for ($i = 0; $i < count($coins); $i++) {
//            Checking if there is still a remainder
//            121 -
            if ($remainder - $coins[$i]['value'] >= 0) {

                if ($coins[$i]['count'] > 0) {

//                    var_dump($coins[$i]['value']);
//                    echo "     ";
//                    var_dump($coins[$i]['count']);

                    $remainder -= $coins[$i]['value'];

                    $remainderInCash = ($coins[$i]['value'] / 100);

                    $outputMoney .= "\${$remainderInCash} ";

//                    echo "remainder is : ";
//                    var_dump($remainder);
                }

            }
        }
    }

    echo "Here's your change! {$outputMoney}\n";
//    var_dump($outputMoneyTEST);

    exit;
}