<?php
include 'connect.php';

if (isset($_GET['id'])) {
    // Vraag verwijderen
    $stmt = $conn->prepare("DELETE FROM vraag_en_opties WHERE id = ?");
    $stmt->execute([$_GET['id']]);

    echo "Vraag verwijderen. <a href='manage_questions.php'>Terug naar beheer</a>";
} else {
    echo "Geen vraag gespecificeerd voor verwijdering.";
}
?>