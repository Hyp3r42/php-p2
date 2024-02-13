<?php
// Auteur: Talha Kucuker
// Functie: verwijder data

// Controleer of de id parameter is ingesteld en geldig is
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Verbind met de database
    include "connect.php"; // Zorg ervoor dat dit bestand de juiste databaseverbinding bevat

    // Voorbereid SQL-query om de rij met de opgegeven id te verwijderen
    $sql = "DELETE FROM fietsen WHERE id = :id";

    // Prepare
    $stmt = $conn->prepare($sql);

    // Bind de parameters
    $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

    // Uitvoeren
    if ($stmt->execute()) {
        // Rij succesvol verwijderd, doorsturen naar de startpagina of een andere pagina
        header("Location: crud.php"); // Verander index.php naar de naam van de pagina waar je naartoe wilt doorsturen na het verwijderen
        exit();
    } else {
        // Er is een fout opgetreden bij het verwijderen van de rij
        echo "Fout bij het verwijderen van de rij: " . $stmt->errorInfo()[2];
        exit();
    }
} else {
    // Geen geldige id ontvangen
    echo "Ongeldige id ontvangen.";
    exit();
}
?>