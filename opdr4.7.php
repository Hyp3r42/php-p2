<?php
$spaargeld = 800; // Vervang dit met het werkelijke bedrag dat je hebt

$telefoon_prijs = 1000;

$tekort = $telefoon_prijs - $spaargeld;

if ($tekort > 250) {
    echo "Je hebt een tekort van €" . $tekort . ". Misschien moet je een baantje zoeken.";
} elseif ($tekort <= 250 && $tekort > 0) {
    echo "Je hebt bijna genoeg geld!";
    echo " Nog €" . $tekort . " te gaan.";
} else {
    $over = $spaargeld - $telefoon_prijs;
    echo "Je kunt de telefoon kopen!";
    echo " Je hebt nog €" . $over . " over voor een hoesje.";
}
?>