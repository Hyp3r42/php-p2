<?php
if (!isset($_COOKIE['total_visits'])) {
    setcookie('total_visits', 1, time() + 3600); // Cookie geldig voor 1 uur
    echo "Welkom op de pagina! Dit is je eerste bezoek.";
} else {
    $total_visits = $_COOKIE['total_visits'] + 1;
    setcookie('total_visits', $total_visits, time() + 3600);
    echo "Welkom terug! Je hebt deze pagina al " . $total_visits . " keer bezocht.";
}
?>