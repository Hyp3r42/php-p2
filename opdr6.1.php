<?php
session_start();

if (isset($_SESSION['page_visits'])) {
    $_SESSION['page_visits']++;
} else {
    $_SESSION['page_visits'] = 1;
}

echo "Aantal paginabezoeken: " . $_SESSION['page_visits'];
?>