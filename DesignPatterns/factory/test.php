<?php

// 注册自加载
include "../autoload.php";

/************************************* 工厂模式 *************************************/

use factory\Canyon;

// 获取单例
$canyon = new Canyon();

$canyon->call(1);
$canyon->call(2);