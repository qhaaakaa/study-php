<?php

namespace factoryAbstract;

/**
 * 具体产品Ａ2
 */
class ProductA2 implements AbstractProductA
{
    private $_name;

    public function __construct()
    {
        $this->_name = 'product A2';
    }

    public function getName()
    {
        return $this->_name;
    }
}