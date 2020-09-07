<?php

namespace Qh\redis;


/**
 * redis单例模式
 */
class Redis
{
    private static $_instance = NULL;

    private function __construct()
    {
    }

    private function __destruct()
    {
        self::getInstance()->close();
    }

    private static function getInstance()
    {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }

        return self::$_instance::conn();
    }

    private static function conn()
    {
        try {
            $conn = new \Redis();
            $conn->connect("127.0.0.1", "6379");
            return $conn;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}