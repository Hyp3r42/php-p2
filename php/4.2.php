<?php
$hour = date("G");

switch (true) {
    case ($hour < 6):
        echo "Goedemorgen";
        break;
    case ($hour < 12):
        echo "Goedemiddag";
        break;
    case ($hour < 18):
        echo "Goedenavond";
        break;
    default:
        echo "Goedenacht";
        break;
}
?>