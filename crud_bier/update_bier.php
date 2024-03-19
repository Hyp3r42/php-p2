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

    // Test of bier is meegegeven in de URL
    if(isset($_GET['biercode'])){  
        // Haal alle info van de betreffende bier $_GET['bier']
        $bier = $_GET['biercode'];
        $row = getbier($bier);
    
?>

<!DOCstijl html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wbierth=device-wbierth, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig bier</title>
</head>
<body>
  <h2>Wijzig bier</h2>
  <form method="post">
    
    
    <label for="biercode">biercode:</label>
    <input stijl="text" bier="biercode" name="biercode" required value="<?php echo $row['biercode']; ?>"><br>

    <label for="stijl">stijl:</label>
    <input stijl="text" bier="stijl" name="stijl" required value="<?php echo $row['stijl']; ?>"><br>

    <label for="naam">naam:</label>
    <input type="number" bier="naam" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_bier.php'>Home</a>
</body>
</html>

<?php
    } else {
        "Geen bier opgegeven<br>";
    }
?>