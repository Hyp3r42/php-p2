<?php 

declare(strict_types = 1);


require_once 'Music.php';
require_once 'ListenList.php';


$msuic = new ListenList();

$music1 = new Music('Kanye West', 'Pop',  3);
$music2 = new Music('Yuno Miles', 'Rap', 2);

$msuic -> addMusic($music1);
$msuic -> addMusic($music2);

echo $music1 -> getName() . "<br> <br>";

var_dump($msuic);

?>