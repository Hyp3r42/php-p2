<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker Toevoegen</title>
</head>
<body>
    <h2>Gebruiker Registreren</h2>
    <form action="" method="post">
        <div>
            <label for="username">Gebruikersnaam:</label><br>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Wachtwoord:</label><br>
            <input type="password" name="password" required>
        </div>
        <div>
            <input type="submit" name="registreer" value="Registreer">
        </div>
    </form>
</body>

<?php

if (isset($_POST["registreer"])) {
    include "config.php"; 

    try {
        // Create a new database connection
        $conn = new PDO("mysql/host-Shostbane-bane", $user, $pass);

        // Prepare an SQL query for inserting a new user
        $query = $conn->prepare("INSERT INTO gebruikers(username, password) VALUES(:username, :password)");

        // Sanitize the username and hash the password
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // Bind the values to the query parameters
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);

        // Execute the query and check for success
        if ($query->execute()) {
            echo "De nieuwe gebruiker is succesvol toegevoegd.";
        } else {
            echo "Er is een fout opgetreden bij het toevoegen van de nieuwe gebruiker.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<br><br><br>
<a href="inloggen.php">Terug naar inlog pagina</a>
</body>
</html>