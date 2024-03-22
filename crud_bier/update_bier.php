<?php
// functie: update bier
// auteur: Wigmans

require_once('functions.php');

// Test of er op de wijzig-knop is gedrukt 
if(isset($_POST['btn_wzg'])){

    // test of update gelukt is
    if(updatebier($_POST) == true){
        echo "<script>alert('bier is gewijzigd')</script>";
    } else {
        echo '<script>alert("bier is NIET gewijzigd")</script>';
    }
}

// Test of biercode is meegegeven in de URL
if(isset($_GET['biercode'])){  
    // Haal alle info van de betreffende bier $_GET['biercode']
    $biercode = $_GET['biercode']; // Haal de biercode op uit de URL
    $row = getbier($biercode); // Haal de rij op basis van de biercode

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig bier</title>
</head>
<body>
  <h2>Wijzig bier</h2>
  <form method="post">
    <label for="naam">Naam:</label>
    <input type="text" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <label for="soort">Soort:</label>
    <input type="text" name="soort" required value="<?php echo $row['soort']; ?>"><br>

    <label for="stijl">Stijl:</label>
    <input type="text" name="stijl" required value="<?php echo $row['stijl']; ?>"><br>

    <label for="alcohol">Alcohol:</label>
    <input type="text" name="alcohol" required value="<?php echo $row['alcohol']; ?>"><br>

    <label for="biercode">brouwcode:</label>
    <select name="biercode" required>
      <?php

      $biercodes = getData('brouwer');
        // Loop door alle biercodes om ze weer te geven als opties in de dropdown
        foreach ($biercodes as $code) {
          echo "<option value='".$code['biercode']."'>".$code['naam']."</option>";
        }
      ?>
    </select><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_bier.php'>Home</a>
</body>
</html>
<?php

} else {
    echo "Geen biercode opgegeven in de URL.";
}
?>