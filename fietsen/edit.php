<?php
  if(isset($_GET['id'])) {

    //echo "Mijn id =" . $_GET['id'];

    // Haal de rij-info op van fiets met bijbehorende id
    // SELECT * FROM fietsen WHERE id = 1

    // connect database
    include "connect.php";

    // Maak een query
    $sql = " SELECT * FROM fietsen WHERE id = :id";
    // Prepare
    $stmt = $conn->prepare($sql);
    // Uitvoeren
    $stmt->execute(
        [':id'=>$_GET['id']]
    );
    // Ophalen alle data
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

<h2>Wijzig Fiets</h2>
<form action="edit_db.php" method="post">

<input type="hidden" id="merk" name="ID" required value="<?php echo $result['ID']; ?>"><br>
    <label for="merk">Merk:</label>
    <input type="text" id="merk" name="merk" required value="<?php echo $result['merk']; ?>"><br>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type" required value= "<?= $result['type']; ?>"><br>

    <label for="prijs">Prijs:</label>
    <input type="number" id="prijs" name="prijs" required value= "<?= $result['prijs']; ?>"><br>

    <label for="foto">Foto (URL):</label>
    <input type="text" id="foto" name="foto" required value= "<?= $result['Foto']; ?>"><br>

    <input type="submit" value="Voeg Toe">
</form>



</body>
</html>