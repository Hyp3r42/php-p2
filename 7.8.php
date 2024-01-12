<?php
session_start();

// Controleer of de 'fruits' sessievariabele is geÃ¯nitialiseerd
if (!isset($_SESSION['fruits'])) {
    $_SESSION['fruits'] = array(); // Initialiseer als een lege array als dat nodig is
}

if(isset($_POST['add_fruit'])){
    $fruit = $_POST['fruit'];
    array_push($_SESSION['fruits'], $fruit);
}

if(isset($_POST['sort_fruits'])){
    sort($_SESSION['fruits']);
}

if(isset($_POST['shuffle_fruits'])){
    shuffle($_SESSION['fruits']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Opdracht 8</title>
</head>
<body>

<form method="post" action="">
    <label for="fruit">Fruitsoort:</label>
    <input type="text" id="fruit" name="fruit">
    <input type="submit" name="add_fruit" value="Toevoegen">
    <input type="submit" name="sort_fruits" value="Sorteren">
    <input type="submit" name="shuffle_fruits" value="'Schudden'">
</form>

<h2>Inhoud van de array:</h2>
<ul>
    <?php
    if(isset($_SESSION['fruits'])){
        foreach($_SESSION['fruits'] as $fruit){
            echo "<li>$fruit</li>";
        }
    }
    ?>
</ul>

</body>
</html>