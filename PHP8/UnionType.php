<?php
//新增对联合类型的支持
//联合类型允许一个变量拥有多个类型的值，而不是一个（参考 C 语言的联合类型很好理解）。
declare(strict_types=1);

class Number
{
    private int|float $number;

    public function setNumber(int|float $number): void
    {
        $this->number = $number;
    }

    public function getNumber(): int|float
    {
        return $this->number;
    }
}

/**
 * 我们可以传递浮点型和整型值到 Number 对象
 */
$number = new Number();
$number->setNumber(5);
var_dump($number->getNumber());
$number->setNumber(11.54);
var_dump($number->getNumber());
exit;