<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 3]
        ];
    }
//    /**
//     * @dataProvider additionProvider
//     */
//    public function testAdd($a, $b, $expected)
//    {
//        $this->assertEquals($expected, $a + $b);
//    }
//
//    public function additionProvider()
//    {
//        return [
//            [0, 0, 0],
//            [0, 1, 1],
//            [1, 0, 1],
//            [1, 1, 3]
//        ];
//    }
}