<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=fietsemaker";
    "root", "")
    $query = $db->prepare("DELETE FROM fietsen WHERE id = 2");
    if($query->execute()) {
        echo "Het item is verwijderd.";
    } else {
        echo "Er is een fout opgetreden!";
    }
} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}

$query = $db->prepare("SELECT * FROM fietsen");
$query->execute();
$result = $query->fetchALL(PDO:: FETCH_ASSOC);
foreach($result as $data) {
    echo"<a href='delete_master.php?id=" .$data['id'] . "'>";
    echo $data["merk"] . " " . $data["type"];
    echo "</a>";
    echo "</br>";
}
?>