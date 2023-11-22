<?php

$datum = date ('l d F Y'). ".";

echo "Het is vandaag: $datum";
echo "<br>";

echo "vandaag is het de " . date ('z'). "e dag van het jaar. ";
echo "<br>";

echo date('l'). " is de ". date('w'). "e dag van het jaar.";
echo "<br>";

echo "De maand ". date('F'). " heeft in totaal ". date('t'). " dagen.";
echo "<br>";

$s = date('L');
$year = date('Y');

if ($s == 1) {
    echo "Het jaar $year is een schikkeljaar";
}
else{
    echo "Het jaar $year is geen schrikkeljaar";
}

?>