<!DOCTYPE html>
<html>
<head>
    <title>Opdracht </title>
</head>
<body>

<h1>Opdracht </h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="prijs">Prijs:</label><br>
    <input type="number" id="prijs" name="prijs" required><br>
    <label for="korting">Korting (%):</label><br>
    <input type="number" id="korting" name="korting" required><br>
    <input type="submit" name="submit" value="Uitrekenen">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prijs = floatval($_POST["prijs"]);
    $korting = floatval($_POST["korting"]);
    $kortingBedrag = ($prijs / 100) * $korting;
    $totaalBedrag = $prijs - $kortingBedrag;

    echo "<h2>Bedrag inclusief " . $korting . "% korting: €" . number_format($totaalBedrag, 2, ',', '.') . "</h2>";
}
?>

</body>
</html>