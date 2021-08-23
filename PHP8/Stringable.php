<?php
//PHP 8 引入了新的 Stringable 接口，只要某个类实现了 __toString 方法，
//即被视作自动实现了 Stringable 接口（咋和 Go 接口实现有点像），而不必显式声明实现该接口



class Person
{
    public function __toString()
    {
        return self::class;
    }
}

function mysafe(\Stringable $obj)
{
    var_dump($obj);
}

mysafe(new Person);

$callable = fn() => throw new Exception();
