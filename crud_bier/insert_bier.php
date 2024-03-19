<?php
    // functie: formulier en database insert bier
    // auteur: Wigmans

    echo "<h1>Insert bier</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertbier($_POST) == true){
            echo "<script>alert('bier is toegevoegd')</script>";
        } else {
            echo '<script>alert("bier is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="naam">naam:</label>
        <input stijl="text" biercode="naam" name="naam" required><br>

        <label for="stijl">stijl:</label>
        <input stijl="text" biercode="stijl" name="stijl" required><br>

        <label for="biercode">biercode:</label>
        <input stijl="number" biercode="biercode" name="biercode" required><br>

        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='crud_bier.php'>Home</a>
    </body>
</html>