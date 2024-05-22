<?php

class product
{
 public $name = "een soort drinken";
 public $price;


public function formatprice()

   {
          return number_format($this->price, decimals: 2);
   }

}

$drink1 = new product();
$drink1->name = "Fanta";
$drink1->price = "2";


$drink2 = new product();
$drink2->name = "pepsi";
$drink2->price = "2";


$drink3 = new product();
$drink3->name = "Coca cola";

echo $drink1->formatprice(). "<br>";
echo $drink1->name. "<br>";


echo $drink2->formatprice(). "<br>";
echo $drink2->name. "<br>";



echo $drink3->name. "<br>";



$drink1->name = "Caprisun";
echo $drink1->name. "<br>";

var_dump($drink1);
var_dump($drink2);
var_dump($drink3);

?>