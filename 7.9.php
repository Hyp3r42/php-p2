<!DOCTYPE html>
<html>
<head>
    <title>Opdracht 9</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="txt">Tekst:</label><br>
    <textarea id="txt" name="txt" rows="4" cols="50"></textarea><br>
    <input type="radio" id="radio1" name="uitvoermethode" value="1" checked>
    <label for="radio1">In hoofdletters</label><br>
    <input type="radio" id="radio2" name="uitvoermethode" value="2">
    <label for="radio2">In kleine letters</label><br>
    <input type="radio" id="radio3" name="uitvoermethode" value="3">
    <label for="radio3">Eerste letter van zin hoofdletter</label><br>
    <input type="radio" id="radio4" name="uitvoermethode" value="4">
    <label for="radio4">Eerste letter van ieder woord hoofdletter</label><br>
    <input type="submit" name="submit" value="Verzenden">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tekst = $_POST["txt"];
    $uitvoermethode = $_POST["uitvoermethode"];

    if ($uitvoermethode == "1") {
        echo strtoupper($tekst);
    } elseif ($uitvoermethode == "2") {
        echo strtolower($tekst);
    } elseif ($uitvoermethode == "3") {
        echo ucfirst($tekst);
    } elseif ($uitvoermethode == "4") {
        $words = explode(' ', $tekst);
        $words = array_map('ucfirst', $words);
        echo implode(' ', $words);
    }
}
?>

</body>
</html>