<?php
function BepaalGemiddelde($cijfers) {
    $totaal = 0;
    $aantal = count($cijfers);

    for ($i = 0; $i < $aantal; $i++) {
        $totaal += $cijfers[$i];
    }

    if ($aantal > 0) {
        $gemiddelde = $totaal / $aantal;
        return $gemiddelde;
    } else {
        return 0;
    }
}

$cijfers = array(2, 3, 4);
$gemiddelde = BepaalGemiddelde($cijfers);
echo $gemiddelde;

?>