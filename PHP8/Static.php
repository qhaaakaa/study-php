<?php

declare(strict_types=1);

//PHP 8 中可以使用 static 关键字标识某个方法返回该方法当前所属的类，即使它是继承的（后期静态绑定）：

class Test {
    public function doWhatever(): static {
        // Do whatever.
        return $this;
    }
}
//PHP 8 中可以使用 $object::class 获取对象的类名，其返回结果和 get_class($object) 一样：

echo Test::class;
echo "<br />";

//new 和 instanceof 关键字现在可以被用于任意表达式
class Foo {}
class Bar {}


$names = ['Foo', 'Bar'];
$class = new ($names[array_rand($names)]);

var_dump($class);

exit;