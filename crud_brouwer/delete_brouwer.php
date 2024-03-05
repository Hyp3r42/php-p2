<?php
// auteur: Wigmans
// functie: verwijder een bier op basis van de id
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['id'])){

    // test of insert gelukt is
    if(deletebrouwer($_GET['id']) == true){
        echo '<script>alert("brouwercode: ' . $_GET['id'] . ' is verwijderd")</script>';
        echo "<script> location.replace('crud_brouwer.php'); </script>";
    } else {
        echo '<script>alert("brouwer is NIET verwijderd")</script>';
    }
}
?>

