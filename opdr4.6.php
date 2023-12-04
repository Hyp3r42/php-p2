<?php
$current_hour = date("H");
$temperatuur = 22; 
$luchtvochtigheid = 80;

if (
    $current_hour >= 17 ||
    ($temperatuur < 20 && $luchtvochtigheid < 85)
) {
    echo "De airco moet uit.";
} else {
    echo "De airco kan aanblijven.";
}
?>