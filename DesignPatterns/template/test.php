<?php
/**
 * 行为型模式
 *
 * php模板模式
 * 理解：典型的控制反转，子类复写算法，但是最终的调用都是抽象类中定义的方式，也就是说抽象类中
 * 定义了算法的执行顺序
 * 使用场景：例如短信系统，选择不同的短信商，但是发送短信的动作都是一样的,未来要增加不同的厂商
 * 只需添加子类即可
 *
 * 下面实现一个短信发送系统
 */


// 注册自加载
include "../autoload.php";

/************************************* 模板模式 *************************************/

/*
 * 个人理解：抽象类中定义好方法模板，子类负责继承和完成方法即可
 */

use template\SmsCompanyOne;
use template\SmsCompanyTwo;

try {
    // 用厂商one发短信
    $one = new SmsCompanyOne([
        'appkey' => 'akjlooolllnn',
    ]);
    $one->send('13666666666');

    // 用厂商two发短息
    $one = new SmsCompanyTwo([
        'pwd' => 'adadeooonn',
    ]);
    $one->send('13666666666');

} catch (\Exception $e) {
    echo 'error:' . $e->getMessage();
}