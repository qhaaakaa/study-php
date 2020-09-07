<?php

include "ProductFactory.php";
include "DigitalProduct.php";
include "ShippableProduct.php";

class AbstractFactoryTest {
    public function testCanCreateDigitalProduct()
    {
        $factory = new ProductFactory();
        $product = $factory->createDigitalProduct(150);
        echo 123;
    }
}

$test = new AbstractFactoryTest();

$test->testCanCreateDigitalProduct();