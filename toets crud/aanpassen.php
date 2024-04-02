<?php
// Auteur: Talha Kucuker
// Functie: Bewerk gegevens in de database

// Verbinding maken met de database
include "connect.php"; // Inclusie van het bestand Connect.php om verbinding te maken met de database

// Controleer of er een kroegcode is meegegeven via de URL
if (isset($_GET['kroegcode'])) { // Controleert of er een 'kroegcode'-parameter aanwezig is in de URL
    // Ontvang en beveilig de kroegcode van de kroeg die moet worden bewerkt
    $kroegcode = htmlspecialchars($_GET['kroegcode']); // Haalt de 'kroegcode'-waarde uit de URL en voorkomt HTML-injecties

    // Bereid een query voor om de gegevens van de kroeg op te halen op basis van de kroegcode
    $sql = "SELECT * FROM kroeg WHERE kroegcode = :kroegcode"; // SQL-query om kroeggegevens op te halen op basis van de kroegcode
    $stmt = $conn->prepare($sql); // Bereid de SQL-query voor
    $stmt->bindParam(':kroegcode', $kroegcode); // Bind de kroegcode-parameter aan de query
    $stmt->execute(); // Voer de query uit
    $kroeg = $stmt->fetch(PDO::FETCH_ASSOC); // Haal de kroeggegevens op en sla ze op in een associatieve array

    // Controleer of de kroeg is gevonden
    if (!$kroeg) { // Als de kroeg niet is gevonden
        echo "Kroeg niet gevonden."; // Geef een melding dat de kroeg niet is gevonden
        exit; // Stop de uitvoering van het script
    }
} else {
    echo "Geen kroegcode opgegeven."; // Geef een melding dat er geen kroegcode is opgegeven
    exit; // Stop de uitvoering van het script
}

// Controleren of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formuliergegevens ophalen en valideren (aanvullende validatie is aan te bevelen)
    $naam = htmlspecialchars($_POST["naam"]);
    $adres = htmlspecialchars($_POST["adres"]);
    $plaats = htmlspecialchars($_POST["plaats"]);

    // Voorbereiden en uitvoeren van de SQL-query om gegevens bij te werken
    $sql = "UPDATE kroeg SET naam = :naam, adres = :adres, plaats = :plaats WHERE kroegcode = :kroegcode";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':adres', $adres);
    $stmt->bindParam(':plaats', $plaats);
    $stmt->bindParam(':kroegcode', $kroegcode);

    // Voer de query uit
    if ($stmt->execute()) {
        // Redirect naar selecteer.php om de wijzigingen te bekijken
        header("Location: selecteer.php?kroegcode=$kroegcode");
        exit();
    } else {
        // Melding weergeven als er een fout optrad bij het bijwerken van gegevens
        echo "Er is een fout opgetreden bij het bijwerken van gegevens in de database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Kroeg</title>
</head>
<body>

<h2>Bewerk Kroeg</h2>

<form action="" method="post">
    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" value="<?php echo $kroeg['naam']; ?>" required><br>

    <label for="adres">Adres:</label>
    <input type="text" id="adres" name="adres" value="<?php echo $kroeg['adres']; ?>" required><br>

    <label for="plaats">Plaats:</label>
    <input type="text" id="plaats" name="plaats" value="<?php echo $kroeg['plaats']; ?>" required><br>

    <input type="submit" value="Bewaar Wijzigingen">
</form>

</body>
</html>

<?php
// Sluit de databaseverbinding
$conn = null;
?>