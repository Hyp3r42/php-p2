<?php 
// auteur Talha Kucuker
//Functie: data fiets update in database

// test of er data is gepost
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    print_r($_POST);

    //doe update in database
    //UPDATE fietsen SET prijs = '699.99' 
    //WHERE fietsen.id = 1;

     // connect database
     include "crud.php";

     // Maak een query
     $sql = " 
        UPDATE fietsen SET 
         merk = :merk, 
         type = :type, 
         prijs = :prijs
     WHERE id = :id";
     // Prepare
     $stmt = $conn->prepare($sql);
     // Uitvoeren
     $status =  $stmt->execute([
        ':merk'=>$_POST['merk'],
        ':type'=>$_POST['type'],
        ':prijs'=>$_POST['prijs'],
            ':id'=>$_POST['id']

     ]);

     if ($status) {
     header("Location: crud.php");
        exit();
} else {
    echo "Update is fout gegaan<br>";
}}
?>