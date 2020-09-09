<?php
/**
 * 行为型模式
 *
 * php访问者模式
 *
 * 说说我对的策略模式和访问者模式的区分：
 * 乍一看，其实两者都挺像的，都是实体类依赖了外部实体的算法，但是：
 * 对于策略模式：首先你是有一堆算法，然后在不同的逻辑中去使用；
 * 对于访问者模式：实体的【结构是稳定的】，但是结构中元素的算法却是多变的，
 * 比如就像人吃饭这个动作
 * 是稳定不变的，但是具体吃的行为却又是多变的；
 */


// 注册自加载
include "../autoload.php";

/************************************* 访问者模式 *************************************/

/*
 * 访问的对象不同，所获取的信息也不同
 */
use visitor\Person;
use visitor\VisitorAsia;
use visitor\VisitorAmerica;

// 生产一个人的实例
$person = new Person();

// 来到了亚洲
$person->eat(new VisitorAsia());

// 来到了美洲
$person->eat(new VisitorAmerica());