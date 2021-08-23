<?php
//当我们在子类重写父类方法时，任何数量的参数现在都可以被替换成可变参数，只要对应参数类型是兼容的即可
declare(strict_types=1);


class A {
    public function method(int $many, string $parameters, $here) {
    }
}

class B extends A {
    public function method(...$everything) {
        var_dump($everything);
    }
}

$b = new B();
$b->method('i can be overwritten!', 'test', '123', '444');
exit;