<?php
    // functie: formulier en database insert brouwer
    // auteur: Wigmans

    echo "<h1>Insert brouwer</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertbrouwer($_POST) == true){
            echo "<script>alert('brouwer is toegevoegd')</script>";
        } else {
            echo '<script>alert("brouwer is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="naam">naam:</label>
        <input land="text" brouwcode="naam" name="naam" required><br>

        <label for="land">land:</label>
        <input land="text" brouwcode="land" name="land" required><br>

        <label for="brouwcode">brouwcode:</label>
        <input land="number" brouwcode="brouwcode" name="brouwcode" required><br>

        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='crud_brouwer.php'>Home</a>
    </body>
</html>