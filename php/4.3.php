<?php
$number1 = 10;
$number2 = 20;

if ($number1 > $number2) {
    $result = ($number1 * 2) + $number2;
} else {
    $result = ($number2 * 2) + $number1;
}

echo "Het resultaat is: " . $result;
?>