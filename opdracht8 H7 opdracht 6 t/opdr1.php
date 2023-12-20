<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTW</title>
</head>
<body>
    <form action="" method="post">
        Bedrag exclusief BTW <input type="text" name="bedrag" value="" placeholder="vul getal in">
        <p><input type="radio" name="BTW" value="negen"> laag 9%</p>
        <p><input type="radio" name="BTW" value="21"> hoog 21%</p>
        <p><input type="submit" name="uitrekenen" value="Uitrekenen"></p>
    </form>

    <?php
        // de eerste keer is het bedrag nog niet ingevuld dus dan overslaan
        if (isset($_POST['bedrag']) == true) {
            if ($_POST['BTW'] == "negen") {
                $percentage = 1.09;
            } else {
                $percentage = 1.21;
            }

            // bereken de prijs incl BTW
            $uitkomst = $_POST['bedrag'] * $percentage;

            echo "Bedrag: " .number_format( $_POST['bedrag'], 2) . "<br>";
            echo "Bedrag met BTW: " . number_format($uitkomst,2) . "<br>";
        }
    ?>
</body>
</html>