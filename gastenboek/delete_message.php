<?php
require_once('config.php');

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$message_id = $_GET['id'];

$user_id = $_SESSION['user_id'];
$is_admin = ($_SESSION['role'] ===  'admin');

$sql = "SELECT * FROM guestbook WHERE id = $message_id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($row['user_id'] == $user_id || $is_admin) {
        if (isset($_POST['confirm_delete'])){
            $delete_sql = "DELETE FROM guestbook WHERE id = $message_id";
            if ($conn->query($delete_sql) === TRUE) {
                header("Location: index.php");
                exit();
            } else {
                echo "Fout bij het verwijderen van het bericht: " . $conn->error;
            }
        }
    }
} else {

    echo "U heeft een toestemming om dit bericht te verwijderen.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>bericht verwijderen</h2>
    <p>weet u zeker dat u het volgende bericht wilt verwijderen?</p>
    <p><strong>Bericht:</strong> <?php echo $row['message']; ?> </p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=$message_id"); ?>"method="post">
         <input type="submit" name="confirm_delete" value="Verwijderen">
         <button type="button" onclick="location.href='index.php';">Annuleren</button>
    </form>
</body>
</html>