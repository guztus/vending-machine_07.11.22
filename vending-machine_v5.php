<?php declare(strict_types=1);

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

function formatMoney(int $amount, string $moneyType = '$'): string
{
    return $moneyType . ($amount / 100);
}

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
    ['value' => 10, 'count' => 0], // empty
    ['value' => 5, 'count' => 55],
    ['value' => 2, 'count' => 0], // empty
    ['value' => 1, 'count' => 0],
];

while (true) {

    echo "Please choose your product by entering a number!\n";

    $productCount = 0;

    foreach ($products as $product) {
        $productCost = $product['cost'] / 100;
        echo "{$productCount} - {$product['name']} (\${$productCost})\n";
        $productCount++;
    }

    $userSelection = (int)readline();
    $userTotalCash = 0;
    $remainder = 0;
    $selectedProductPrice = $products[$userSelection]['cost'];

    if ($userSelection < count($products) && $userSelection >= 0) {
        $selectedProduct = $userSelection;
        $remainder = $selectedProductPrice;
    } else {
        continue;
    }

    $inputCoinsInWords = '';

    $inputRemainder = abs($userTotalCash - $selectedProductPrice);

    while ($userTotalCash < $selectedProductPrice) {

        echo "Total price is " . formatMoney($selectedProductPrice) . "\n";
        echo "Remainder is " . formatMoney($inputRemainder) . "! Please insert more coins!\n";

        $userInputCoins = (int)readline();

        $coinKeys = array_keys($coins);

        $coinIsValid = 0;
        $coinChosenId = 0;
        foreach ($coinKeys as $coinKey) {
            if ($userInputCoins == $coins[$coinKey]['value']) {

                $coinIsValid++;

                $coinChosenId = $coinKey;
                break;
            }
        }

        if ($coinIsValid == 1) {
            $userTotalCash += $userInputCoins;
            $inputRemainder -= $userInputCoins;

            $inputCoinsInWords .= " " . formatMoney($userInputCoins);
            $coins[$coinChosenId]['count']++;
        }

        echo "---- ----\n";
        echo "You have input -{$inputCoinsInWords}\n";
        echo "---- ----\n";
    }

    $outputMoney = '';
    $outputMoneyTEST = 0;

    $remainder = $userTotalCash - $remainder;
    $totalRemainder = $remainder;

    while ($remainder > 0) {
        for ($i = 0; $i < count($coins); $i++) {
            if ($coins[$i]['count'] > 0) {
                if (intdiv($remainder, $coins[$i]['value']) > 0) {

                    $remainder -= $coins[$i]['value'];

                    $remainderInCash = formatMoney($coins[$i]['value']);

                    $outputMoney .= "{$remainderInCash} ";
                }
            }
        }
        if ($remainder > 0) {
            $userTotalCash = formatMoney($userTotalCash);
            echo "Sorry, we don't have any change to give! ({$remainder}) \nHere's your money back! {$inputCoinsInWords} ($userTotalCash)\n";
            exit;
        }
    }

    echo "Enjoy your {$products[$userSelection]['name']}!\n";
    if (strlen($outputMoney) > 0) {
        $totalRemainder = formatMoney($totalRemainder);
        echo "Here's your change! {$outputMoney} ({$totalRemainder}) \n";
    }
    exit;
}
