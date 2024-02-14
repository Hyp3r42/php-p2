<?php
// Auteur: Talha Kucuker
// Functie: edit

if(isset($_GET['id'])){

    // echo "Mijn id = " . $_GET['id'] ;

    // haal de rij-info op van fiets met bijbehorende id 

    // SELECT * FROM fietsen WHERE id = 1
    // connect database
    Include "connect.php";

    //maak een query
    $sql = "SELECT * FROM fietsen WHERE id = :id";

    //prepare
    $stmt = $conn->prepare($sql);
    //uitvoeren
    $stmt->execute(
        [':id'=>$_GET['id']] 
     );
    // openhalen alle data
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    print_r($result);

}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fietsen Formulier</title>
</head>
<body>
<h2>Voeg een fiets toe</h2>

<form action="edit_db.php" method="post">

<input type="hidden" id="merk" name="id" required value="<?php echo $result['ID']; ?>"><br>
<label for="merk">Merk:</label>
<input type="text" name="merk" required value="<?php echo $result['merk']; ?>"><br>

<label for="type">Type:</label>
<input type="text" name="type" required value="<?=$result['type'] ?>"><br>

<label for="prijs">Prijs:</label>
<input type="number" name="prijs" required value="<?=$result['prijs'] ?>"><br>
 
<input type="submit" value="Voeg Fiets Toe">
</form>
</body>
</html>