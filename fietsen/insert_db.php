<?php
// auteur: Talha Kucuker
// Functie: toevoegen van 1 fietd

// test of toevoeg knop is ingedrutkt
if($_SERVER ["REQUEST_METHOD"] == "POST") {
    echo "Er is gepost<br>";
    print_r($_POST);


    // connect database
    include "connect.php";

    // maak een query
    $sql = "INSERT INTO fietsen (merk, type, prijs foto;
    VALUES (:merk, :type, :prijs, :foto);";
    // Prepare query
    $query = $conn->prepare($sql);
    // Uitvoeren query
    $status = $query->execute(
        [
            ':merk'=>$_POST['merk'],
            ':type'=>$_POST['type'],
            ':prijs'=>$_POST['prijs'],
            ':foto'=>$_POST['foto'],
        ]
        );

        // Test of insert gelukt is
        if($status == true){
            echo"<script>alert('Fiets is toegevoegd')</script>;
            echo"<script> location.replace('crud.php');
        } else {
            echo'<script>alert("Fiets is NIET toegevoegd")</script>';
        }
    }

?>