<?php
function berekenLooptijd($startkapitaal, $rentepercentage, $jaarlijkseOpname) {
    $jaar = 0;
    while ($startkapitaal > 0) {
        $jaar += 1;
        $startkapitaal *= (1 + $rentepercentage / 100);
        $startkapitaal -= $jaarlijkseOpname;
        if ($jaar > 100) {
            return "U kunt dit bedrag voor de rest van uw leven blijven opnemen.";
        }
    }
    return "U kunt " . ($jaar - 1) . " jaar lang €" . $jaarlijkseOpname . " opnemen.";
}

$startkapitaal = 100000;
$rentepercentage = 4;
$jaarlijkseOpname = 5000;

echo berekenLooptijd($startkapitaal, $rentepercentage, $jaarlijkseOpname);
?>