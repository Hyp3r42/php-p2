<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fietsen Formulier</title>
</head>
<body>
<h2>Voeg Fiets Toe</h2>
<form action="insert_db.php" method="post">
    <label for="merk">Merk:</label>
    <input type="text" id="merk" name="merk" required><br>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type" required><br>

    <label for="prijs">Prijs:</label>
    <input type="number" id="prijs" name="prijs" required><br>

    <input type="submit" value="Voeg Toe">
</form>



</body>
</html>