<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    /**
     * 测试相等性
     * @test
     */
    public function testEquals1()
    {
        $stack = 0;
        $this->assertEquals(0, $stack);
    }

    /**
     * 测试相等性
     * @test
     */
    public function testEquals2()
    {
        $stack = 1;
        $this->assertEquals(0, $stack);
    }
}