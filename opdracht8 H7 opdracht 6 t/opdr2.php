<!DOCTYPE html>
<html>
<head>
    <title>Opdracht</title>
</head>
<body>
    <form action="" method="post">
        Getal 1: <input type="number" name="getal1"><br>
        Getal 2: <input type="number" name="getal2"><br>
        <input type="radio" name="optie" value="optellen">Optellen<br>
        <input type="radio" name="optie" value="aftrekken">Aftrekken<br>
        <input type="radio" name="optie" value="vermenigvuldigen">Vermenigvuldigen<br>
        <input type="radio" name="optie" value="delen">Delen<br>
        <input type="submit" name="verzenden" value="Berekenen">
    </form>

    <?php
    if(isset($_POST['verzenden'])){
        $getal1 = $_POST['getal1'];
        $getal2 = $_POST['getal2'];
        $optie = $_POST['optie'];

        switch($optie){
            case 'optellen':
                $resultaat = $getal1 + $getal2;
                break;
            case 'aftrekken':
                $resultaat = $getal1 - $getal2;
                break;
            case 'vermenigvuldigen':
                $resultaat = $getal1 * $getal2;
                break;
            case 'delen':
                if($getal2 != 0){
                    $resultaat = $getal1 / $getal2;
                } else {
                    $resultaat = "Kan niet delen door 0";
                }
                break;
        }

        echo "Het resultaat is: " . $resultaat;
    }
?>

</body>
</html>