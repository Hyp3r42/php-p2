<?php

// Auteur: Talha Kucuker
// Functie: data fiets update in database

// Test of er data gepost is 

if ($_SERVER['REQUEST_METHOD'] == "POST")  {
    print_r($_POST); 

    // doe update in de database
    // UPDATE `fietsen` SET `prijs` = '700'
    // WHERE `fietsen`.`ID` = 1;

    
    // connect database
    include "connect.php";

    // Maak een query
    $sql = "
           UPDATE `fietsen` SET 
           merk = :merk,
           type = :type,
           prijs = :prijs,
        WHERE id = :id";
    // Prepare
    $stmt = $conn->prepare($sql);
    // Uitvoeren
    $stmt->execute([
        ':merk'=>$_POST['merk'],
        ':type'=>$_POST['type'],
        ':prijs'=>$_POST['prijs'],
        ':id'=>$_POST['ID']

    ]);
if ($stmt->rowCount() == 1) {
header("location: crud.php");
} else {
    echo "Update is fout gegaan<br>";
}
}

?>