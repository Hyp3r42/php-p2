<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kroeg Overzicht</title>
</head>
<body>

<h2>Kroegen Overzicht</h2>

<!-- Toevoegknop -->
<form action="kroeg_toevoegen.php" method="get">
    <button type="submit">Toevoegen</button>
</form>

<?php
// Verbinding maken met de database
include "connect.php";

// Controleer of er een POST-verzoek is gedaan om een kroeg te verwijderen
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verwijderen'])) {
    // Ontvang de kroegcode van de kroeg die moet worden verwijderd en valideer deze
    $verwijder_kroegcode = htmlspecialchars($_POST['verwijderen']);

    // Bereid een SQL DELETE-query voor om de kroeg met de opgegeven kroegcode te verwijderen
    $sql_delete = "DELETE FROM kroeg WHERE kroegcode = :verwijder_kroegcode"; // SQL-query om een rij te verwijderen uit de tabel 'kroeg' op basis van de kroegcode
    $stmt_delete = $conn->prepare($sql_delete); // Voorbereiden van de SQL-query voor uitvoering
    $stmt_delete->bindParam(':verwijder_kroegcode', $verwijder_kroegcode); // Bind de waarde van 'verwijder_kroegcode' aan de queryparameter ':verwijder_kroegcode'

    // Voer de DELETE-query uit
    if ($stmt_delete->execute()) { // Controleert of de query succesvol is uitgevoerd
        // Vernieuw de pagina
        header("Refresh:0"); // Vernieuwt de pagina na 0 seconden
        exit(); // Stop het script om verdere uitvoering te voorkomen
    } else {
        // Melding weergeven als er een fout optrad bij het verwijderen van de kroeg
        echo "Er is een fout opgetreden bij het verwijderen van de kroeg.";
    }
}

// Maak een query om kroegen op te halen
$sql = "SELECT * FROM kroeg"; // SQL-query om alle gegevens op te halen uit de tabel 'kroeg'
// Prepare query
$stmt = $conn->prepare($sql); // Voorbereiden van de SQL-query voor uitvoering
// Uitvoeren
$stmt->execute(); // Uitvoeren van de voorbereide query
// Ophalen alle data
$kroegen = $stmt->fetchAll(PDO::FETCH_ASSOC); // Ophalen van alle resultaten als associatieve array

// Controleer of de resultaten niet leeg zijn voordat je de tabel afdrukt
if (!empty($kroegen)) {
    // Print de data rij voor rij 
    
    echo "<table border='1'>";
    // Eerste rij voor kolomnamen
    echo "<tr><th>Naam</th><th>Adres</th><th>Plaats</th><th>Wijzig</th><th>Verwijderen</th></tr>";
    foreach ($kroegen as $kroeg) {
        echo "<tr>";
        echo "<td>" . $kroeg['naam'] . "</td>"; // Toont de waarde van 'naam' in de huidige rij
        echo "<td>" . $kroeg['adres'] . "</td>"; // Toont de waarde van 'adres' in de huidige rij
        echo "<td>" . $kroeg['plaats'] . "</td>"; // Toont de waarde van 'plaats' in de huidige rij
        echo "<td><a href='aanpassen.php?kroegcode=" . $kroeg['kroegcode'] . "'>Wijzig</a></td>"; // Toont een hyperlink om de gegevens van deze rij te wijzigen
        echo "<td><form method='post'><button type='submit' name='verwijderen' value='" . $kroeg['kroegcode'] . "' style='background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer; border-radius: 3px;'>Verwijderen</button></form></td>"; // Toont een knop om de rij te verwijderen
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Geen kroegen gevonden in de database."; // Melding weergeven als er geen gegevens zijn gevonden in de database
}

// Sluit de databaseverbinding
$conn = null; // Sluit de databaseverbinding om resources vrij te geven
?>