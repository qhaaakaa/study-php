<?php
namespace factoryAbstract;

//跑车
interface IProductSportCar
{
    public function driver();
}

//MINI车
interface IProductMiniCar
{
    public function driver();
    public function playMusic();
}

//实现的跑车产品
class BenzSport implements IProductSportCar
{
    public function driver()
    {
        echo 'driver' . PHP_EOL;
    }
}

class BmwSport implements IProductSportCar
{
    public function driver()
    {
        echo 'driver' . PHP_EOL;
    }
}

//实现的MINI车产品
class BenzMini implements IProductMiniCar
{
    public function driver()
    {
        echo 'driver' . PHP_EOL;
    }

    public function playMusic()
    {
        echo 'playMusic' . PHP_EOL;
    }
}

class BmwMini implements IProductMiniCar
{
    public function driver()
    {
        echo 'driver' . PHP_EOL;
    }

    public function playMusic()
    {
        echo 'playMusic' . PHP_EOL;
    }
}

//抽象工厂（能生产各种类型车）：
interface IFactory
{
    public function makeMiniCar();//Mini车
    public function makeSportCar();//跑车
}

//抽象工厂实现
//宝马工厂
class FactoryBmw implements IFactory
{
    public function makeMiniCar()
    {
        return new BmwMini();
    }

    public function makeSportCar()
    {
        return new BmwSport();
    }
}

//奔驰工厂
class FactoryBenz implements IFactory
{
    public function makeMiniCar()
    {
        return new BenzMini();
    }

    public function makeSportCar()
    {
        return new BenzSport();
    }
}

//生产奔驰跑车
$benzFactory = new FactoryBenz();
$benzCar = $benzFactory->makeSportCar();
$benzCar->driver();

//生产宝马MINI
$bmwFactory = new FactoryBmw();
$bmwCar = $bmwFactory->makeMiniCar();
$bmwCar->playMusic();