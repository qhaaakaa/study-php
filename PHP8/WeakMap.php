<?php
//新增 WeakMap 特性
//WeakMap 允许你创建对象到任意值的映射（类似 SplObjectStorage），同时也不会阻止作为键的对象被垃圾回收。如果某个对象键被垃圾回收，对应键值对将从集合中移除。
//这一新特性非常有用，因为这样一来，开发者就不必担心代码存在内存泄露了。大多数 PHP 开发者可能对此并不关心，
//但是当你编写长时间运行的进程时一定要提防这个问题，比如使用 ReactPHP 进行事件驱动编程时：有了 WeakMap 后，引用的对象会在失效时自动被垃圾回收。
//如果你在数组中做同样的事情，则仍然会持有该对象的引用，从而导致内存泄露。
//简单来说 你用weakmap unset会回收 传统数组不会回收

declare(strict_types=1);

class FooBar
{

    public WeakMap $cache;

    public function __construct()
    {
        $this->cache = new WeakMap();
    }

    public function getSomethingWithCaching(object $obj)
    {
        return $this->cache[$obj] ??= $this->computeSomethingExpensive($obj);
    }

    public function computeSomethingExpensive(object $obj)
    {
        var_dump("I got called");
        return rand(1, 100);
    }
}

$cacheObject = new stdClass;
$obj = new FooBar;

// "I got called" 只会打印一次

$obj->getSomethingWithCaching($cacheObject);
$obj->getSomethingWithCaching($cacheObject);
var_dump(count($obj->cache));

// 删除该对象后 WeakMap 会释放相应内存
unset($cacheObject);
var_dump(count($obj->cache));

exit;