<?php
// Include the connect.php file to establish database connection
include 'connect.php';

// Check if the form for adding a new question has been submitted
if (isset($_POST['addQuestion'])) {
    $stmt = $conn->prepare("INSERT INTO vraag_en_opties (vraag, antwoord1, antwoord2, antwoord3, antwoord4) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['question'], $_POST['answer1'], $_POST['answer2'], $_POST['answer3'], $_POST['answer4']]);
    echo "Vraag toegevoegd.";
}
?>
<form action="manage_questions.php" method="post">
    Vraag: <input type="text" name="question" required><br/>
    Antwoord 1: <input type="text" name="answer1" required><br/>
    Antwoord 2: <input type="text" name="answer2" required><br/>
    Antwoord 3: <input type="text" name="answer3" required><br/>
    Antwoord 4: <input type="text" name="answer4" required><br/>
    <button type="submit" name="addQuestion">Voeg vraag toe</button>
</form>

<?php
$stmt = $conn->prepare("SELECT * FROM vraag_en_opties");
$stmt->execute();
$questions = $stmt->fetchAll();

foreach ($questions as $question) {
    echo "Vraag:" . htmlspecialchars($question['vraag']) . "<br/>";

    // Toon antwoorden hier indien nodig
    echo "<li><a href='edit_question.php?id=" . $question['id'] . "'>Bewerk</a> | ";
    echo "<li><a href='delete_question.php?id=" . $question['id'] . "'>Verwijder</a><br><br/>";

}
?><a href="index.php">Index.php</a>