<?php
require "config.php";
session_start();
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $query = $db->query("SELECT username FROM gebruikers");
    $gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtwoord wijzigen</title>
</head>
<body>
    <h2>Wachtwoord wijzigen voor gebruiker</h2>
    <form action="verwerkingwachtwoord.php" method="post">
        <div>
            <label for="username">Selecteer gebruiker:</label><br>
            <select id="username" name="username" required>
                <?php foreach ($gebruikers as $gebruiker): ?>
                    <option value="<?= htmlspecialchars($gebruiker['username']); ?>"><?= htmlspecialchars($gebruiker['username'])?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="newPassword">Nieuw wachtwoord:</label><br>
            <input type="password" id="newPassword" name="newPassword" required>
        </div>
        <div>
            <input type="submit" value="Wachtwoord wijzigen">
        </div>
    </form>
</body>
</html>