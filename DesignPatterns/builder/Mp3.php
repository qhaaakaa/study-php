<?php

namespace builder;

use builder\ProductInterface;

/**
 * Mp3构建器
 */
class Mp3 implements ProductInterface
{
    /**
     * 名称
     * @var string
     */
    private $_name = '';

    /**
     * 处理器
     * @var string
     */
    private $_cpu = '';

    /**
     * 内存
     * @var string
     */
    private $_ram = '';

    /**
     * 储存
     * @var string
     */
    private $_storage = '';

    /**
     * 系统
     * @var string
     */
    private $_os = '';

    /**
     * 构造函数
     *
     * @param string $name 名称
     * @param array $hardware 构建硬件
     * @param array $software 构建软件
     */
    public function __construct($name = '', $hardware = array(), $software = array())
    {
        // 名称
        $this->_name = $name;
        echo $this->_name . " 配置如下：\n";
        // 构建硬件
        $this->hardware($hardware);
        // 构建软件
        $this->software($software);
    }

    /**
     * 构建硬件
     *
     * @param array $hardware 硬件参数
     * @return void
     */
    public function hardware($hardware = array())
    {
        // 创建 CPU
        $this->_cpu = new HardwareCpu($hardware['cpu']);

        // 创建内存
        $this->_ram = new HardwareRam($hardware['ram']);

        // 创建存储
        $this->_storage = new HardwareStorage($hardware['storage']);
    }

    /**
     * 构建软件
     *
     * @param array $software 软件参数
     * @return void
     */
    public function software($software = array())
    {
        // 创建操作系统
        $softwareOs = new SoftwareOs();
        $this->_os = $softwareOs->produce($software['os']);
    }
}