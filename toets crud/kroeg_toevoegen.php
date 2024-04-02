<?php
// Verbinding maken met de database
include "connect.php";

// Controleren of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formuliergegevens ophalen en valideren (aanvullende validatie is aan te bevelen)
    $naam = isset($_POST["naam"]) ? htmlspecialchars($_POST["naam"]) : null; // Haalt de ingediende waarde van het formulier op voor 'naam' en beveiligt deze tegen HTML-injectie
    $adres = isset($_POST["adres"]) ? htmlspecialchars($_POST["adres"]) : null; // Haalt de ingediende waarde van het formulier op voor 'adres' en beveiligt deze tegen HTML-injectie
    $plaats = isset($_POST["plaats"]) ? htmlspecialchars($_POST["plaats"]) : null; // Haalt de ingediende waarde van het formulier op voor 'plaats' en beveiligt deze tegen HTML-injectie

    // Controleer of alle vereiste velden zijn ingevuld
    if ($naam && $adres && $plaats) {
        // Voorbereiden en uitvoeren van de SQL-query om gegevens toe te voegen
        $sql = "INSERT INTO kroeg (naam, adres, plaats) VALUES (:naam, :adres, :plaats)"; // SQL-query om gegevens in de database toe te voegen
        $stmt = $conn->prepare($sql); // Voorbereiden van de SQL-query voor uitvoering

        // Bind de waarden aan de queryparameters
        $stmt->bindParam(':naam', $naam); // Bind de waarde van 'naam' aan de queryparameter ':naam'
        $stmt->bindParam(':adres', $adres); // Bind de waarde van 'adres' aan de queryparameter ':adres'
        $stmt->bindParam(':plaats', $plaats); // Bind de waarde van 'plaats' aan de queryparameter ':plaats'

        // Voer de query uit
        if ($stmt->execute()) { // Controleert of de query succesvol is uitgevoerd
            // Redirect naar de pagina zelf om de gegevens opnieuw te laden
            header("Location: {$_SERVER['PHP_SELF']}"); // Laad de huidige pagina opnieuw om de gegevens bij te werken
            exit(); // Stop het script om verdere uitvoering te voorkomen
        } else {
            // Melding weergeven als er een fout optrad bij het toevoegen van gegevens
            echo "Er is een fout opgetreden bij het toevoegen van gegevens aan de database.";
        }
    } else {
        // Melding weergeven als niet alle vereiste velden zijn ingevuld
        echo "Niet alle vereiste velden zijn ingevuld.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kroeg Toevoegen</title>
</head>
<body>

<h1>Kroeg Toevoegen</h1>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="naam">Naam:</label><br>
    <input type="text" id="naam" name="naam" required><br>

    <label for="adres">Adres:</label><br>
    <input type="text" id="adres" name="adres" required><br>

    <label for="plaats">Plaats:</label><br>
    <input type="text" id="plaats" name="plaats" required><br><br>

    <input type="submit" value="Toevoegen">
</form>
<a href='selecteer.php'>Home</a>
</body>
</html>