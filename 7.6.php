<!DOCTYPE html>
<html>
<head>
    <title>Opdracht 6</title>
</head>
<body>
    <form method="post" action="">
        <label for="cijfer">Cijfer:</label>
        <input type="text" id="cijfer" name="cijfer">
        <button type="submit">Toevoegen</button>
    </form>

    <?php
session_start();

if (!isset($_SESSION['cijfers'])) {
    $_SESSION['cijfers'] = [];
}

$cijfers = $_SESSION['cijfers'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cijfer'])) {
    $cijfer = $_POST['cijfer'];

    if (is_numeric($cijfer) && $cijfer >= 1.0 && $cijfer <= 10.0) {
        $cijfers[] = round(floatval($cijfer), 1);
        $_SESSION['cijfers'] = $cijfers;
        echo "Het cijfer $cijfer is toegevoegd.";
    } else {
        echo "Het ingevoerde cijfer $cijfer is ongeldig en is niet toegevoegd.";
    }
}

$gemiddelde = !empty($cijfers) ? round(array_sum($cijfers) / count($cijfers), 1) : 0;

echo "<br>";
echo "Aantal ingevoerde cijfers: " . count($cijfers);
echo "<br>";
echo "Gemiddelde: $gemiddelde";
?>


</body>
</html>