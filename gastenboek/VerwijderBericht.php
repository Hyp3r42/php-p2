<?php
// database gegevens includen.
include "connectpdo.php"

// id ophalen

if(isset($_GET['id']))
{
$id = $_GET['id'];
echo "$id";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error  mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // sql to delete a record
    $sql = "DELETE FROM berichten WHERE id ='$id'";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    // terugsturen naar de hoofdpagina
    header('Location: index.php');
}
 catch(PDOException $e)
  {
   // echo $sql . "<br>" . $e->getMessage();
  }
}
$conn = null;