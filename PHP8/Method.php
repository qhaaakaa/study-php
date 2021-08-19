<?php

declare(strict_types=1);

#在PHP 8中，内部函数参数强制执行类型和值验证，如果不允许使用预期的类型或值，则将抛出TypeError或ValueError异常错误.
#在PHP 8之前，这会导致PHP警告.
//
//1.TypeError触发条件
//提供的值是不是正确的类型.
//
//2.ValueError触发条件
//如果提供的值是正确的类型，但PHP在上下文中不可接受，则PHP会引发ValueError异常.

//substr('foo', []);

try{
    substr('linux',[]);
}catch(TypeError $e){
    echo $e->getMessage();
}


/**
 * 传递数组到 array_rand，类型正确，但是 array_rand 期望传入的是非空数组
 * 所以会抛出 ValueError 异常
 */

//array_rand([], 0);

/**
 * json_decode 的深度参数必须是有效的正整型值，
 * 所以这里也会抛出 ValueError 异常
 */

//json_decode('{}', true, -1);