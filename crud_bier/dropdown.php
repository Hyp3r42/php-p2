<?php

include "functions.php";

$values = GetData('bieren')


//var_dump($values)
//exit

$text = "Kies brouwercode:
                <select name='brouwercode'>
                    <option value='678'>EX-MORRELS</option>
                    <option value='2'>optie 2 </option>

                    foreach ($values as $value) {
                        $text ."<option value>='" . $value . "'>" . $value . "</option>";

                    }

                <select>";
echo $text;