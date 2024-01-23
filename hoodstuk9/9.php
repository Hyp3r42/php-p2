<?php
try {
$db = new PDO ("mysql:host=localhosy;dbname=fietsenmaker",
"root", "root");
$query = $db->prepare("SELECT * FROM fietsen");
$query->execute();
} catch(PDOException $e) {
    die("Error!: " . $e->getMassage());
}
?>