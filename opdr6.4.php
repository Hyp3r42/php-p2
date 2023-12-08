<?php
function berekenCirkel($straal) {
    $pi = 3.14;
    $omtrek = 2 * $pi * $straal;
    $oppervlakte = $pi * pow($straal, 2);

    echo "Omtrek: " . $omtrek . "<br>";
    echo "Oppervlakte: " . $oppervlakte;
}

// Test de functie met een straal van 5
berekenCirkel(5);
?>