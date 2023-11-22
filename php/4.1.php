<?php
$hour = date("G");

if ($hour < 12) {
    echo "Goedemorgen";
} elseif ($hour < 18) {
    echo "Goedemiddag";
} elseif ($hour < 24) {
    echo "Goedenavond";
} else {
    echo "Goedenacht";
}
?>