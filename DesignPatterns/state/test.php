<?php
/**
 * 行为型模式
 *
 * php状态模式
 * 理解：行为随着状态变化
 * 区别：
 * - 策略的改变由client完成，client持有context的引用；而状态的改变是由context或状态自己,
 * 就是自身持有context
 * - 简单说就是策略是client持有context，而状态是本身持有context
 * 使用场景：大量和对象状态相关的条件语句
 *
 * 下面我们来实现一个农民四季种菜
 * 春季：玉米
 * 夏季：黄瓜
 * 秋季：白菜
 * 冬季：菠菜
 */


// 注册自加载
include "../autoload.php";

/************************************* 状态模式 *************************************/

/*
 * 个人理解：通过状态去改变类的行为 条件、分支语句的代替者
 */
use state\Farmer;

try {
    // 初始化一个农民
    $farmer = new Farmer();

    // 春季
    $farmer->grow();
    $farmer->harvest();
    // 夏季
    $farmer->grow();
    $farmer->harvest();
    // 秋季
    $farmer->grow();
    $farmer->harvest();
    // 冬季
    $farmer->grow();
    $farmer->harvest();

} catch (\Exception $e) {
    echo 'error:' . $e->getMessage();
}