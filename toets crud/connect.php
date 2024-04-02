<?php 
// Auteur: Talha Kucuker
// Functie: connectie maken met de database fietsenmaker

// Servernaam, gebruikersnaam, wachtwoord en databasenaam voor de databaseverbinding
$servername = "localhost"; // De naam van de server waar de database draait
$username = "root"; // De gebruikersnaam voor de databaseverbinding
$password = ""; // Het wachtwoord voor de databaseverbinding
$dbname = "bieren"; // De naam van de database waar verbinding mee gemaakt wordt

try {
  // Probeer een nieuwe PDO-verbinding tot stand te brengen met de opgegeven gegevens
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // Stel de PDO-foutmodus in op ERRMODE_EXCEPTION om uitzonderingen te genereren bij fouten
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully"; // Melding dat de verbinding succesvol is (uitgeschakeld)
} catch(PDOException $e) {
  // Vang een PDO-uitzondering op en geef de foutmelding weer als er een fout optreedt bij het maken van de verbinding
  echo "Connection failed: " . $e->getMessage();
}

?>  