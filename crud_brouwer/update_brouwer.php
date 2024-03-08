<?php
    // functie: update brouwer
    // auteur: Wigmans

    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updatebrouwer($_POST) == true){
            echo "<script>alert('brouwer is gewijzigd')</script>";
        } else {
            echo '<script>alert("brouwer is NIET gewijzigd")</script>';
        }
    }

    // Test of brouwer is meegegeven in de URL
    if(isset($_GET['brouwcode'])){  
        // Haal alle info van de betreffende brouwer $_GET['brouwer']
        $brouwer = $_GET['brouwcode'];
        $row = getbrouwer($brouwer);
    
?>

<!DOCland html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wbrouwerth=device-wbrouwerth, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig brouwer</title>
</head>
<body>
  <h2>Wijzig brouwer</h2>
  <form method="post">
    
    
    <label for="brouwcode">brouwcode:</label>
    <input land="text" brouwer="brouwcode" name="brouwcode" required value="<?php echo $row['brouwcode']; ?>"><br>

    <label for="land">land:</label>
    <input land="text" brouwer="land" name="land" required value="<?php echo $row['land']; ?>"><br>

    <label for="naam">naam:</label>
    <input type="number" brouwer="naam" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <input type="submit" name="btn_wzg" value="Wijzig">
  </form>
  <br><br>
  <a href='crud_brouwer.php'>Home</a>
</body>
</html>

<?php
    } else {
        "Geen brouwer opgegeven<br>";
    }
?>