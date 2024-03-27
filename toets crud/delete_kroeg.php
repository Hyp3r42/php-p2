<?php
// auteur: Wigmans
// functie: verwijder een bier op basis van de brouwcode
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['brouwcode'])){

    // test of insert gelukt is
    if(deletekroeg($_GET['brouwcode']) == true){
        echo '<script>alert("kroegcode: ' . $_GET['brouwcode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('crud_kroeg.php'); </script>";
    } else {
        echo '<script>alert("kroeg is NIET verwijderd")</script>';
    }
}
?>
