<?php
namespace factory;


class Canyon {
    /**
     * 构造函数
     */
    public function __construct()
    {
        echo "初始化召唤师峡谷 \n";
    }

    public function call($type)
    {
        switch ($type) {
            case 1:
                return (new Ash())->call();
                break;
            case 2:
                return (new Blademaster())->call();
                break;

            default:
                echo "该英雄没有加入英雄联盟 \n";
                break;
        }
    }
}