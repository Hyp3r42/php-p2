<?php
$postcode = mt_rand(1000, 9999) . " " . chr(mt_rand(65, 90)) . mt_rand(0, 9) . chr(mt_rand(65, 90));
echo "Willekeurige postcode: " . $postcode;
?>