<?php
$productPrice = 160;

if ($productPrice > 150) {
    $productPrice *= 1.19; 
} elseif ($productPrice < 55) {
    $productPrice *= 1.11; 
}

echo "De nieuwe prijs is: " . number_format($productPrice, 2) . " euro";
?>