<?php

// 注册自加载
spl_autoload_register('autoload');

function autoload($class)
{
    require dirname($_SERVER['SCRIPT_FILENAME']) . '//..//' . str_replace('\\', '/', $class) . '.php';
}

/************************************* 单例模式 *************************************/

use singleton\Singleton;

// 获取单例
$first = Singleton::getInstance();
$second = Singleton::getInstance();

$first->a = "测试";

print_r($first);
print_r($second);