
<?php

$productnum = floatval($_POST['productnum']); // Corrected
$code = $_POST['code'];
$product = $_POST['product'];
$price = floatval($_POST['price']); // Corrected

function totalall($price, $productnum) {
    $total = $price * $productnum;
    return $total;
}

function freeall($productnum) {
    $free = floor($productnum / 3);
    return $free;
}

function discountall($price, $free) {
    $discount = $free * $price;
    return $discount;
}

function payall($total, $discount) {
    $payall = $total - $discount;
    return $payall;
}

// Calculate values
$total = totalall($price, $productnum);
$free = freeall($productnum);
$discount = discountall($price, $free);
$pay = payall($total, $discount);

?>