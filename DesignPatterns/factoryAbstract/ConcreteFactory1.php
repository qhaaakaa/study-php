<?php

namespace factoryAbstract;

/**
 * 具体工厂1
 */
class ConcreteFactory1 implements AbstractFactory
{

    public function createProductA()
    {
        return new ProductA1();
    }

    public function createProductB()
    {
        return new ProductB1();
    }
}
