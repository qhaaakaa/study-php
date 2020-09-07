<?php

namespace singleton;

/**
 * Redis单例
 */
class Singleton
{
    private static $_instance = NULL;

    //公有属性，用于测试
    public $a;

    //克隆方法私有化，防止复制实例
    private function __clone()
    {
    }

    private function __construct()
    {
        self::$_instance = self::conn();
    }

    public static function getInstance()
    {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self;
        }

        return self::$_instance;
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