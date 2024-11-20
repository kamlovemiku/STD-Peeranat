.
<?php
$productnum = $_POST['productnum'];
$code = $_POST['code'];
$product = $_POST['product'];
$price = $_POST['price'];

$total = $price * $productnum;
$free = floor($productnum / 3);
$discount = $free * $price;
$pay = $total - $discount;
?>