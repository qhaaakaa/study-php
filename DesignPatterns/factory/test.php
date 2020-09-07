<?php

// 注册自加载
spl_autoload_register('autoload');

function autoload($class)
{
    require dirname($_SERVER['SCRIPT_FILENAME']) . '//..//' . str_replace('\\', '/', $class) . '.php';
}

/************************************* 工厂模式 *************************************/

use factory\Canyon;

// 获取单例
$canyon = new Canyon();

$canyon->call(1);
$canyon->call(2);