<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link rel="stylesheet" type="text/css" href="styles.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script>
       $(document).ready(function(){
           // Zoekfunctie
           $("#search").on("keyup", function() {
               var value = $(this).val().toLowerCase();
               $("table tr").filter(function() {
                   $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
               });
           });

           // Sorteerfunctie
           $("#sort").click(function(){
               var rows = $('table tbody tr').get();

               rows.sort(function(a, b) {
                   var A = $(a).children('td').eq(0).text().toUpperCase();
                   var B = $(b).children('td').eq(0).text().toUpperCase();
                   return A.localeCompare(B);
               });

               $.each(rows, function(index, row) {
                   $('table').children('tbody').append(row);
               });
           });
// Invoerformulier voor nieuwe cijfers
           $("#submit").click(function(){
               var leerling = $("#Leerling").val();
               var cijfer = $("#Cijfer").val();
               var vak = $("#Vak").val(); // Nieuw
               var docent = $("#Leraar").val(); // Nieuw, aangepast van #Docent naar #Leraar
               // Valideer invoer hier indien nodig

               // Voeg nieuwe rij toe aan tabel
               $("table tbody").append("<tr><td>" + leerling + "</td><td>" + cijfer + "</td><td>" + vak + "</td><td>" + docent + "</td></tr>");

               // Voeg nieuwe cijfers toe aan de database met behulp van PHP-scripts
               $.post("add_grades.php", { leerling: leerling, cijfer: cijfer, vak: vak, docent: docent });
           });

           // Verwijderfunctie
           $(document).on("click", ".delete", function(){
               $(this).closest("tr").remove();

               // Verwijder het cijfer uit de database met behulp van PHP-scripts
               var leerling = $(this).closest("tr").find("td").eq(0).text();
               var cijfer = $(this).closest("tr").find("td").eq(1).text();
               $.post("delete_grade.php", { leerling: leerling, cijfer: cijfer });
           });
       });
       </script>
</head>
<body>
<input type="text" id="search" placeholder="Zoeken op leerling..">

<table border="1px">
   <tr>
       <th id="sort">Leerling</th>
       <th>Cijfer</th>
       <th>Vak</th>
       <th>Leraar</th> <!-- Aangepast van Docent naar Leraar -->
   </tr>

   <!-- Vul de tabel met gegevens -->
   <?php
   include "cijferconnect.php";
   $sql = "SELECT * FROM Cijfer";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (!empty($result)) {
       foreach($result as $row) {
           echo "<tr>";
           echo "<td>" . $row['Leerling'] . "</td>";
           echo "<td>" . $row['Cijfer'] . "</td>";
           echo "<td>" . $row['Vak'] . "</td>"; 
           echo "<td>" . $row['Leraar'] . "</td>";
           echo "<td><button class='delete'>Verwijder</button></td>";
           echo "</tr>";
       }
   } else {
       echo "<tr><td colspan='4'>Geen resultaten gevonden</td></tr>";
   }
   ?>
</table>

<h2>Voeg nieuwe cijfers toe:</h2>
<input type="text" id="Leerling" placeholder="Leerling">
<input type="text" id="Cijfer" placeholder="Cijfer">
<input type="text" id="Vak" placeholder="Vak">
<input type="text" id="Leraar" placeholder="Leraar"> <!-- Aangepast van Docent naar Leraar -->
<button id="submit">Toevoegen</button>

</body>
</html>
