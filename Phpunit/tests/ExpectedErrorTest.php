<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class ExpectedErrorTest extends TestCase
{
    /**
     * @expectedException PHPUnit\Framework\Error
     */
    public function testFailingInclude()
    {
        include 'not_existing_file.php';
    }
}