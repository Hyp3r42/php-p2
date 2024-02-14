<?php
// Auteur: Talha Kucuker
// Functie: voeg nieuwe fiets toe

// Connect database
include "connect.php";

$merk = $type = $prijs = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $merk = htmlspecialchars($_POST["merk"]);
    $type = htmlspecialchars($_POST["type"]);
    $prijs = htmlspecialchars($_POST["prijs"]);

    $sql = "INSERT INTO fietsen (merk, type, prijs) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(1, $merk);
    $stmt->bindParam(2, $type);
    $stmt->bindParam(3, $prijs);
    if ($stmt->execute()) {
        header("Location: crud.php");
        exit();
    } else {
        echo "Fout bij het toevoegen van de fiets: " . $stmt->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Fiets Toevoegen</title>
</head>
<body>
    <h2>Voeg een nieuwe fiets toe</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Merk: <input type="text" name="merk" required><br>
        Type: <input type="text" name="type" required><br>
        Prijs: <input type="text" name="prijs" required><br>
        <input type="submit" value="Toevoegen">
    </form>
</body>
</html>