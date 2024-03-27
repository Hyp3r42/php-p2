<?php
    // functie: formulier en database insert kroeg
    // auteur: Talha Kucuker

    echo "<h1>Insert kroeg</h1>";

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
        <input stijl="text" kroegcode="naam" name="naam" required><br>

        <label for="stijl">stijl:</label>
        <input stijl="text" kroegcode="stijl" name="stijl" required><br>

        <label for="soort">soort:</label>
        <input stijl="text" kroegcode="soort" name="soort" required><br>

        
        <label for="alcohol">alcohol:</label>
        <input stijl="text" kroegcode="alcohol" name="alcohol" required><br>

        <label for="kroegcode">brouwcode:</label>
        <input stijl="number" kroegcode="kroegcode" name="kroegcode" required><br>

        <input type="submit" name="btn_ins" value="Insert">
        </form>
        

        
        <br><br>
        <a href='crud_bier.php'>Home</a>
    </body>
</html>