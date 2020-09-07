<?php

namespace factoryAbstract;

/**
 * 客户端
 */
class Client
{

    /**
     * Main program.
     */
    public static function main()
    {
        self::run(new ConcreteFactory1());
        self::run(new ConcreteFactory2());
    }

    /**
     * 调用工厂实例生成产品，输出产品名
     * @param $factory AbstractFactory 工厂实例
     */
    public static function run(AbstractFactory $factory)
    {
        $productA = $factory->createProductA();
        $productB = $factory->createProductB();
        echo $productA->getName(), "\n";
        echo $productB->getName(), "\n";
    }

}