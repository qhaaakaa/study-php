<?php

// 注册自加载
spl_autoload_register('autoload');

function autoload($class)
{
    require dirname($_SERVER['SCRIPT_FILENAME']) . '//..//' . str_replace('\\', '/', $class) . '.php';
}

/************************************* 原型模式 *************************************/
use prototype\Prototype;

// 创建一个原型对象
$prototype = new Prototype();

// 获取一个原型的clone
$prototypeCloneOne = $prototype->getPrototype();
$prototypeCloneOne->_name = 'one';
$prototypeCloneOne->getName();

// 获取一个原型的clone
$prototypeCloneTwo = $prototype->getPrototype();
$prototypeCloneTwo->_name = 'two';
$prototypeCloneTwo->getName();

// 再次获取$prototypeCloneOne的名称
$prototypeCloneOne->getName();