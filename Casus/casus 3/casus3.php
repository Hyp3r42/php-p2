<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "statistiekensysteem1";

// Maak een verbinding
$conn = new mysqli($servername, $username, $password);

// Controleer de verbinding
if ($conn->connect_error) {
    die("Verbinding mislukt: " . $conn->connect_error);
}

// Creëer database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    //echo "Database succesvol aangemaakt<br>";
} else {
    echo "Fout bij het aanmaken van database: " . $conn->error;
}

// Verbind met de nieuwe database
$conn->select_db($dbname);

// Creëer tabel
$sql = "CREATE TABLE IF NOT EXISTS bezoekers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    land VARCHAR(100),
    ip_adres VARCHAR(45),
    provider VARCHAR(100),
    browser VARCHAR(255),
    datum_tijd DATETIME,
    referer VARCHAR(255)
)";
if ($conn->query($sql) === TRUE) {
    //echo "Tabel succesvol aangemaakt<br>";
} else {
    echo "Fout bij het aanmaken van tabel: " . $conn->error;
}

// Voeg voorbeeldgegevens in als de tabel leeg is
$result = $conn->query("SELECT COUNT(*) AS count FROM bezoekers");
$row = $result->fetch_assoc();
if ($row['count'] == 0) {
    for ($i = 0; $i < 100; $i++) {
        $land = 'Netherlands';
        $ip_adres = '192.168.0.' . $i;
        $provider = 'Provider' . rand(1, 3);
        $browser = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36';
        $datum_tijd = '2024-05-30 11:' . str_pad($i, 2, "0", STR_PAD_LEFT) . ':00';
        $referer = 'http://localhost/PHP-P4/';

        $sql = "INSERT INTO bezoekers (land, ip_adres, provider, browser, datum_tijd, referer)
                VALUES ('$land', '$ip_adres', '$provider', '$browser', '$datum_tijd', '$referer')";
        $conn->query($sql);
    }
    //echo "Voorbeeldgegevens succesvol ingevoegd<br>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Statistics System</title>
</head>
<body>
    <h1>Bezoekers Statistiekensysteem</h1>
    <form method="post" action="">
        <label for="month">Month (1-12):</label>
        <input type="number" id="month" name="month" min="1" max="12" required>
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required>
        <button type="submit">Filter</button>
    </form>
    <hr>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $month = $_POST['month'];
        $country = $_POST['country'];

        // Maak opnieuw verbinding met de database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Controleer de verbinding
        if ($conn->connect_error) {
            die("Verbinding mislukt: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM bezoekers WHERE MONTH(datum_tijd) = ? AND land = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $month, $country);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Country</th>
                        <th>IP Address</th>
                        <th>Provider</th>
                        <th>Browser</th>
                        <th>Date/Time</th>
                        <th>Referrer</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['land'] . "</td>
                        <td>" . $row['ip_adres'] . "</td>
                        <td>" . $row['provider'] . "</td>
                        <td>" . $row['browser'] . "</td>
                        <td>" . $row['datum_tijd'] . "</td>
                        <td>" . $row['referer'] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Geen resultaten gevonden.";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>