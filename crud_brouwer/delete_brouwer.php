<?php
// auteur: Wigmans
// functie: verwijder een bier op basis van de brouwcode
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['brouwcode'])){

    // test of insert gelukt is
    if(deletebrouwer($_GET['brouwcode']) == true){
        echo '<script>alert("brouwercode: ' . $_GET['brouwcode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('crud_brouwer.php'); </script>";
    } else {
        echo '<script>alert("brouwer is NIET verwijderd")</script>';
    }
}
?>