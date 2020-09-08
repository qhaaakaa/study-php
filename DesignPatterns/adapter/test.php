<?php

/**
 * 结构型模式
 *
 * php适配器模式
 * 把实现了不同接口的对象通过适配器的方式组合起来放在一个新的环境
 *
 */


// 注册自加载
spl_autoload_register('autoload');

function autoload($class)
{
    require dirname($_SERVER['SCRIPT_FILENAME']) . '//..//' . str_replace('\\', '/', $class) . '.php';
}

/************************************* 适配器模式 *************************************/

/*
 * 个人理解 ： 将2个完全不兼容的接口进行适配，可以结合2个接口的功能
 */
use adapter\AudioPlayer;

try {
    //生产一台设备
    $mp4 = new AudioPlayer();
    // 播放一个mp3
    $mp4->play('忍者', 'mp3');
    // 播放一个wma
    $mp4->play('彩虹', 'wma');
    // 播放一个mp4
    $mp4->play('龙卷风mv', 'mp4');
} catch (\Exception $e) {
    echo $e->getMessage();
}