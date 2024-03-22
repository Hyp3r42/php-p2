<?php
// Including the database connection
include 'connect.php';

// Retrieve all questions from the database
$stmt = $conn->prepare("SELECT * FROM vraag_en_opties");
$stmt->execute();
$questions = $stmt->fetchAll();

// Loop through each question and display the results
foreach ($questions as $question) {
    echo "<h2>" . htmlspecialchars($question ['vraag']) . "</h2>";

    // Totaal aantal stemmen voor de huidige vfaag initialiseren
    $totalVotes = 0;

    // Calculate the total number of votes for this question
    $stmt = $conn->prepare("SELECT SUM(votes) AS totalVotes FROM poll WHERE question_id = ?");
    $stmt->execute([$question['id']]);
    $totalResult = $stmt->fetch();
    if ($totalResult) {
        $totalVotes = $totalResult['totalVotes'];
    }

    // Display the number of votes and percentage for each option
    for ($i = 1; $i <= 4; $i++) {
        $answer = $question ["antwoord" . $i];
        if (!empty($answer)) {
            // Get the number of votes for this specific choice
            $stmt = $conn->prepare("SELECT votes FROM poll WHERE question_id = ? AND choice = ?");
            $stmt->execute([$question['id'], $i]);
            $result = $stmt->fetch();
            $votes = $result ? $result['votes'] : 0;

            // Calculate the percentage of the total number of votes
            $percentage = $totalVotes > 0 ? round(($votes / $totalVotes) * 100, 2) : 0;

            // Display the results
            echo htmlspecialchars($answer) . " : " . $votes . " stemmen (" . $percentage . "%) <br/>";
}
    }
    echo "<hr/>";
}