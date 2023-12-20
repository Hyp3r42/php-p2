<!DOCTYPE html>
<html>
<head>
    <title>Radio Buttons voor achtergrondkleur</title>
    <style>
        body {
            background-color: yellow;
        }

        .result {
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>
<body>

<h1>Kies een kleur om de achtergrondkleur te veranderen</h1>

<div class="result">
    Resultaat:
</div>

<form method="post">
    <label><input type="radio" name="kleur" value="red"> Rood</label><br>
    <label><input type="radio" name="kleur" value="green"> Groen</label><br>
    <label><input type="radio" name="kleur" value="blue"> Blauw</label><br>
    <label><input type="radio" name="kleur" value="yellow"> Geel</label><br>
    <input type="submit" value="Verander kleur">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['kleur'])) {
        $kleur = $_POST['kleur'];
        echo "<script>document.body.style.backgroundColor = '$kleur';</script>";
        echo "<script>document.querySelector('.result').innerText = 'Resultaat: Achtergrondkleur is nu $kleur';</script>";
    }
}
?>

</body>
</html>
