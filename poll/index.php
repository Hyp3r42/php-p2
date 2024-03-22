<?php
// Inclusief de database connectie bestand
include 'connect.php';

// Controleer of het formulier is ingediend
if (isset($_POST['submit'])) {
    // Haal de gekozen vraag ID en keuze (antwoord) uit het formulier
    $questionId = $_POST['questionId'];
    $choice = $_POST['choice'];

    // Probeer het huidige aantal stemmen voor de gekozen optie op te halen
    $stmt = $conn->prepare("SELECT votes FROM poll WHERE question_id = ? AND choice = ?");
    $stmt->execute([$questionId, $choice]);
    $temp = $stmt->fetch();

    // Als er al stemmen zijn, verhoog dan het aantal stemmen
    if ($temp) {
        $newVotes = $temp['votes'] + 1;
        $stmt = $conn->prepare("UPDATE poll SET votes = ? WHERE question_id = ? AND choice = ?");
        $stmt->execute([$newVotes, $questionId, $choice]);
    } else {
        // Als deze keuze nog geen stemmen heeft, voeg dan een nieuwe rij toe
        $stmt = $conn->prepare("INSERT INTO poll (question_id, choice, votes) VALUES (?, ?, 1)");
        $stmt->execute([$questionId, $choice]);
    }

    // Haal alle vragen op uit de database
    $stmt = $conn->prepare("SELECT * FROM vraag_en_opties");
    $stmt->execute();
    $questions = $stmt->fetchAll();

    // Voor elke vraag, toon de vraag en de antwoordopties
    foreach ($questions as $question) {
        echo $question["vraag"] . "<br/>";
        echo '<form action="" method="post">';

        // Itereer door elk mogelijk antwoord en maak een radiobutton voor elk
        for ($i = 1; $i <= 4; $i++) {
            $answer = $question["antwoord" . $i];
            if (!empty($answer)) {
                echo '<input type="radio" name="choice" value="' . $i . '"> ' . htmlspecialchars($answer) . '<br/>';
            }
        }

        // Verberg de vraag ID in een hidden input
        echo '<input type="hidden" name="questionId" value="' . $question["id"] . '">';

        // Toon een knop om de stem in te dienen
        echo '<input type="submit" name="submit" value="Stem">';
        echo '</form>';
        echo "<hr/>";
    }
} else {
    // Als het formulier nog niet is ingediend, haal alle vragen op uit de database
    $stmt = $conn->prepare("SELECT * FROM vraag_en_opties");
    $stmt->execute();
    $questions = $stmt->fetchAll();

    // Voor elke vraag, toon de vraag en de antwoordopties
    foreach ($questions as $question) {
        echo $question["vraag"] . "<br/>";
        echo '<form action="" method="post">';

        // Itereer door elk mogelijk antwoord en maak een radiobutton voor elk
        for ($i = 1; $i <= 4; $i++) {
            $answer = $question["antwoord" . $i];
            if (!empty($answer)) {
                echo '<input type="radio" name="choice" value="' . $i . '"> ' . htmlspecialchars($answer) . '<br/>';
            }
        }

        // Verberg de vraag ID in een hidden input
        echo '<input type="hidden" name="questionId" value="' . $question["id"] . '">';

        // Toon een knop om de stem in te dienen
        echo '<input type="submit" name="submit" value="Stem">';
        echo '</form>';
       echo "<hr/>";
    }
}

// Sluit de Databas
$conn = null;
?>