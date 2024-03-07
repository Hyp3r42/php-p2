<?php
require "config.php";
session_start();
try {
    $pdo = new PDO("mysql:host=Shost;dbname=bane", $user, $pass);
    $query = $pdo->query("SELECT username FROM gebruikers");
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
            <label for="username">Selecteer gebruikers:</label><br>
            <select id="username" name="username" required>
                <?php foreach ($gebruikers as $gebruikers): ?>
                    <option value="<?php echo htmlspecialchars($gebruikers["username"]); ?>">
                        <?php echo htmlspecialchars($gebruikers["username"]); ?>
                    </option>
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