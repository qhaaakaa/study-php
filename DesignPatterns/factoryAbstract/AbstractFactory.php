<?php

namespace factoryAbstract;

/**
 * 抽象工厂
 */
interface AbstractFactory
{
    /**
     * 创建等级结构为A的产品的工厂方法
     */
    public function createProductA();

    /**
     * 创建等级结构为B的产品的工厂方法
     */
    public function createProductB();

}