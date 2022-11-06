<?php
//
//// insert coins
//// choose product
////
//// product has price
//// we give 5 eur
//// we have to get remainder back in 'monetas' - starting from the biggest
////
//// 40 min time
//// extra --
////
//// use objects (arrays)
//
//// 1.
//// User can input money until they can pay for it
//// Check if input is valid
////
//// 2.
//// Cash value count in machine
//
//$products = [
//    ['Hot Chocolate', 121],
//    ['Cappuccino', 180],
//    ['Tea', 120]
//];
//
//$coinValues = [
//    ['value' => 200, 'count' => 50],
//    ['value' => 100, 'count' => 50],
//    ['value' => 50, 'count' => 50],
//    ['value' => 20, 'count' => 50],
//    ['value' => 10, 'count' => 50],
//    ['value' => 5, 'count' => 50],
//    ['value' => 2, 'count' => 0],
//    ['value' => 1, 'count' => 50],
//];
//
//
//while (true) {
//
//    echo "Please choose your product by entering a number!\n";
//
//    $productCount = 0;
//
//    foreach ($products as $product) {
//        $productCost = $product[1] / 100;
//        $productCount++;
//        echo "{$productCount} - {$product[0]} (\${$productCost})\n";
//    }
//
//    $userChoice = (int)readline();
//
////    make cases for if userChoice is not an int
//
//    $userCash = 500;
//
//    $remainder = 0;
//
//
//    $productKeys = array_keys($products);
//
//    $productFound = 0;
//    foreach ($productKeys as $productKey) {
//        if ($userChoice == $productKey + 1) {
//            $remainder = $userCash - $products[$productKey][1];
//            echo "Chosen product is {$products[$productKey][0]}\n";
//            $productFound++;
//            break;
//        }
//    }
//
//    if ($productFound == 0) {
//        continue;
//    }
////
////    switch ($userChoice) {
////        case 1:
////            $remainder = $userCash - $products[0][1];
////            echo "chosen product is {$products[0][0]}\n";
////            break;
////        case 2:
////            $remainder = $userCash - $products[1][1];
////            break;
////        case 3:
////            $remainder = $userCash - $products[2][1];
////            break;
////        default:
////            echo "enter choice pls";
////            break;
////    }
//
//
//    $outputMoney = '';
//    $outputMoneyTEST = 0;
//
//    while ($remainder > 0) {
//        for ($i = 0; $i < count($coinValues); $i++)
//
////            Checking if there is still a remainder
//            if ($remainder - $coinValues[$i]['value'] >= 0) {
//
//                if ($coinValues[$i]['count'] > 0) {
//                    $remainder -= $coinValues[$i]['value'];
//
//                    $remainderInCash = ($coinValues[$i]['value'] / 100);
//
//                    $outputMoney .= "\${$remainderInCash} ";
//                }
//
//            }
////        if ($remainder - $coinValues[1] >= 0) {
////            $remainder -= $coinValues[1];
////            $outputMoney .= "{$coinValues[1]} ";
////        }
//    }
//
//    echo "Output: {$outputMoney}";
////    var_dump($outputMoneyTEST);
//
//    exit;
//}