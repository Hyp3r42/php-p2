<?php
// functie: update kroeg
// auteur: Talha Kucuker

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

// Test of kroegcode is meegegeven in de URL
if(isset($_GET['kroegcode'])){  
    // Haal alle info van de betreffende bier $_GET['kroegcode']
    $kroegcode = $_GET['kroegcode']; // Haal de kroegcode op uit de URL
    $row = getbier($kroegcode); // Haal de rij op basis van de kroegcode

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

    <label for="kroegcode">brouwcode:</label>
    <select name="kroegcode" required>
      <?php

      $kroegcodes = getData('brouwer');
        // Loop door alle kroegcodes om ze weer te geven als opties in de dropdown
        foreach ($kroegcodes as $code) {
          echo "<option value='".$code['kroegcode']."'>".$code['naam']."</option>";
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
    echo "Geen kroegcode opgegeven in de URL.";
}
?>