<?php
class Product
{
    public $name;
    public $currency;
    public $price;

    public function __construct($price, $name, $currency = "&euro")
    {
        $this->name = ucfirst($name);
        $this->price = $price;
        $this->currency = $currency;
    }

    public function formatPrice()
    {
        return number_format($this->price, 2);
    }

    public function getProduct()
    {
        return "Het product " . $this->name . " kost " . $this->currency . " " . $this->formatPrice();
    }
}

$music1 = new Product(40, "nike sock dart premium", "$");

echo $music1->getProduct();

?>