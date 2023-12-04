<?php
$leeftijd = 17; 
$heeft_stempas = true; 

if ($leeftijd >= 16) {
    echo "Je mag een scooter rijbewijs halen.";
} else {
    echo "Je bent nog te jong voor een scooter rijbewijs.";
}

if ($leeftijd >= 18 && $heeft_stempas) {
    echo " Je mag stemmen.";
} elseif ($leeftijd >= 18 && !$heeft_stempas) {
    echo " Je bent oud genoeg om te stemmen, maar je hebt geen stempas ontvangen.";
} else {
    echo "Je bent nog niet oud genoeg om te stemmen.";
}
?>