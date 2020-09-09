<?php
/**
 * 结构型模式
 *
 * php外观模式
 * 把系统中类的调用委托给一个单独的类，对外隐藏了内部的复杂性，很有依赖注入容器的感觉哦
 *
 */


// 注册自加载
include "../autoload.php";

/************************************* 外观模式 *************************************/

/*
 * 个人理解 ： 隐藏具体类的功能实现 只暴露出最简单接口
 */

use facade\AnimalMaker;

// 初始化外观类
$animalMaker = new AnimalMaker();

// 生产一只猪
$animalMaker->producePig();

// 生产一只鸡
$animalMaker->produceChicken();