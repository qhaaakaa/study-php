<?php

include "Product.php";

class DigitalProduct implements Product
{
    private $price;

    public function __construct($price)
    {
        $this->price = $price;
    }

    public function calculatePrice(): int
    {
        return $this->price;
    }
}