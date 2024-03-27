<?php
    // functie: update kroeg
    // auteur: Talha Kucuker

    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updatekroeg($_POST) == true){
            echo "<script>alert('kroeg is gewijzigd')</script>";
        } else {
            echo '<script>alert("kroeg is NIET gewijzigd")</script>';
        }
    }

    // Test of kroeg is meegegeven in de URL
    if(isset($_GET['brouwcode'])){  
        // Haal alle info van de betreffende kroeg $_GET['kroeg']
        $kroeg = $_GET['brouwcode'];
        $row = getkroeg($kroeg);
    
?>

<!DOCland html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wkroegth=device-wkroegth, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig kroeg</title>
</head>
<body>
  <h2>Wijzig kroeg</h2>
  <form method="post">
    
    
    <label for="brouwcode">brouwcode:</label>
    <input land="text" kroeg="brouwcode" name="brouwcode" required value="<?php echo $row['brouwcode']; ?>"><br>

    <label for="land">land:</label>
    <input land="text" kroeg="land" name="land" required value="<?php echo $row['land']; ?>"><br>

    <label for="naam">naam:</label>
    <input type="number" kroeg="naam" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_kroeg.php'>Home</a>
</body>
</html>

<?php
    } else {
        "Geen kroeg opgegeven<br>";
    }
?>