<?php

namespace factoryAbstract;

/**
 * 具体产品Ａ1
 */
class ProductA1 implements AbstractProductA
{
    private $_name;

    public function __construct()
    {
        $this->_name = 'product A1';
    }

    public function getName()
    {
        return $this->_name;
    }
}