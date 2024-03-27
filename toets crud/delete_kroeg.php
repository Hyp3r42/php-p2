<?php
// auteur: Talha Kucuker
// functie: verwijder een bier op basis van de kroegcode
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['kroegcode'])){

    // test of insert gelukt is
    if(deletekroeg($_GET['kroegcode']) == true){
        echo '<script>alert("kroegcode: ' . $_GET['kroegcode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('crud_bier.php'); </script>";
    } else {
        echo '<script>alert("bier is NIET verwijderd")</script>';
    }
}
?>