<?php

/**
 * 行为型模式
 *
 * php观察者模式
 * 观察者观察被观察者，被观察者通知观察者
 *
 * @author  TIGERB <https://github.com/TIGERB>
 * @example 运行 php test.php
 */


// 注册自加载
include "../autoload.php";

/************************************* 观察者模式 *************************************/

/*
 * 个人理解：当一个对象被修改时，则会自动通知依赖它的对象。比如买票场景 买票成功之后自动去通知发送短信通知用户/完成日志记录等
 */
use observer\Observable;
use observer\ObserverExampleOne;
use observer\ObserverExampleTwo;

// 注册一个被观察者对象
$observable = new Observable();
// 注册观察者们
$observerExampleOne = new ObserverExampleOne();
$observerExampleTwo = new ObserverExampleTwo();

// 附加观察者
$observable->attach($observerExampleOne);
$observable->attach($observerExampleTwo);

// 被观察者通知观察者们
$observable->notify();