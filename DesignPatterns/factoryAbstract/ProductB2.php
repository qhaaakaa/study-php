<?php

namespace factoryAbstract;

/**
 * 具体产品B1
 */
class ProductB2 implements AbstractProductB
{
    private $_name;

    public function __construct()
    {
        $this->_name = 'product B2';
    }

    public function getName()
    {
        return $this->_name;
    }
}