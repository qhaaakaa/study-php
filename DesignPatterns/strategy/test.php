<?php
/**
 * 行为型模式
 *
 * php策略模式
 * 策略依照使用而定
 */

// 注册自加载
include "../autoload.php";

/************************************* 策略模式 *************************************/

/*
 * 个人理解：一个类的行为或其算法可以在运行时更改
 */
use strategy\Substance;
use strategy\StrategyExampleOne;
use strategy\StrategyExampleTwo;
use strategy\StrategyFind;
use strategy\ManJianStrategy;
use strategy\DaZheStrategy;

// 使用策略1
$substanceOne = new Substance(new StrategyExampleOne);
$substanceOne->someOperation();

// 使用策略2
$substanceTwo = new Substance(new StrategyExampleTwo);
$substanceTwo->someOperation();


// 满减折算
$mode1 = new StrategyFind(new ManJianStrategy());
$mode1->get(100);

// 满减活动
$mode2= new StrategyFind(new DaZheStrategy());
$mode2->get(100);