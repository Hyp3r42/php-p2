<?php
   // Auteur: Talha
   // Functie: selecteer data

   // connect database
   include "connect.php";

   // Maak een query
   $sql = "SELECT * FROM fietsen";
   // Prepare
   $stmt = $conn->prepare($sql);
   // Uitvoeren
   $stmt->execute();
   // Ophalen alle data
   $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

   // var_dump($result);

   // print de data rij voor mij
   echo "<br>";
   echo "<table border=1px>";
   foreach ($result as $row) {
      echo "<tr>";
      echo "<td>" . $row ['merk'] . "</td> ";
      echo "<td>" . $row ['type'] . "</td> ";
      echo "<td>" . $row ['prijs'] . "</td>";
      echo "<td>" . $row ['Fiets'] . "</td>";
      echo "</tr>";
   }



?>