<?php
// Function to calculate the total price
function calculateTotal($price, $unit) {
    return $price * $unit;
}

// Function to calculate the discount based on total price
function calculateDiscount($total) {
    if ($total >= 20000) {
        return $total * 0.20;
    } else if ($total >= 15000) {
        return $total * 0.15;
    } else if ($total >= 10000) {
        return $total * 0.10;
    } else if ($total >= 5000) {
        return $total * 0.05;
    } else {
        return 0;
    }
}
?>
