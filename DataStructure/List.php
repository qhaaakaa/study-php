<?php

/**
 * Class Node
 * 链表元素
 */
class Node
{
    /**
     * 存储链表元素数据
     * @var string Node data
     */
    public $data = '';

    /**
     * 指向下一个元素的地址
     * @var self next Node
     */
    public $next = null;

    /**
     * 构造方法, 自动插入数据
     * @param $data
     * @param null $next
     */
    public function __construct($data, $next = null)
    {
        $this->data = $data;
        $this->next = $next;
    }
}

/**
 * Class SingleLinkedList
 * 单链表
 */
class SingleLinkedList {
    /**
     * 头指针, 指向第一个元素, 本身变不存储数据
     * @var Node head->next = First Node
     */
    public $head;

    /**
     * 链表长度
     * @var int Linked list Length
     */
    public $length = 0;

    /**
     * 构造方法, 用来插入头指针
     * SingleLinkedList constructor.
     */
    public function __construct()
    {
        $this->head = new Node(null);
    }

    /**
     * 插入数据, 返回$this可链式调用
     * @param $data
     * @return $this
     */
    public function insert($data)
    {
        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }
        $current->next = new Node($data);
        $this->length ++;
        return $this;
    }

    /**
     * 插入数据
     * @param $data
     * @return SingleLinkedList
     * @see insert
     */
    public function push($data)
    {
        return $this->insert($data);
    }

    /**
     * 从头部插入数据
     * @param $data
     * @return $this
     */
    public function headInsert($data)
    {
        //将链表其他全部后移，新插入一个
        $this->head->next = new Node($data, $this->head->next);
        $this->length ++;
        return $this;
    }

    /**
     * 更新元素
     * @param $index
     * @param $newData
     * @return $this|bool
     */
    public function update($index, $newData)
    {
        //判断长度
        if ($this->length === 0 || $index > $this->length) {
            return false;
        }
        $i = 0;
        //获取链表
        $current = $this->head->next;
        //获取位置
        while ($i != $index) {
            $current = $current->next;
            $i ++;
        }
        //修改内部值
        $current->data = $newData;
        return $this;
    }

    /**
     * 弹出第一个元素
     * @return bool|string
     */
    public function pop()
    {
        if ($this->length === 0) {
            return false;
        }
        $data = $this->head->next->data;
        $this->head->next = $this->head->next->next;
        $this->length --;
        return $data;
    }

    /**
     * 获取指定元素
     * @param $index
     * @return bool|string
     */
    public function get($index)
    {
        if ($this->length === 0 || $index > $this->length) {
            return false;
        }
        $i = 0;
        $current = $this->head->next;
        while ($i != $index) {
            $current = $current->next;
            $i ++;
        }
        return $current->data;
    }

    /**
     * 删除指定元素
     * @param $index
     * @return $this
     */
    public function delete($index)
    {
        if ($index < 0) {
            $index = $this->length + $index;
        }
        if ($this->length === 0 || $index > $this->length) {
            return false;
        }
        $current = $this->head;
        $i = 0;
        while ($i < $index) {
            $current = $current->next;
            $i ++;
        }
        $current->next = $current->next->next;
        $this->length --;
        return $this;
    }

    /**
     * 清空链表
     * @return $this
     */
    public function clear()
    {
        $this->head->next = null;
        $this->length = 0;
        return $this;
    }

    /**
     * 打印链表元素
     */
    public function print()
    {
        $current = $this->head->next;
        $i = 0;
        echo '<hr>';
        echo sprintf('共有 %d 个元素 :', $this->length);
        while ($current !== null) {
            echo '<br>';
            echo sprintf('当前第 %d 个元素 :  ', $i);
            print_r($current->data);
            $current = $current->next;
            $i ++;
        }
        echo sprintf('<br>打印结束<br><br>');
    }

    /**
     * 判断链表是否为空
     * @return bool
     */
    public function isEmpty()
    {
        return $this->length === 0;
    }

    /**
     * 反转链表
     * @return bool
     */
    public function reverse()
    {
        if ($this->length === 0) {
            return false;
        }
        // 从第一个元素开始遍历
        $current = $this->head->next;

        $pre = null;
        while ($current !== null) {
            $next = $current->next;
            // 将当前节点的next指向上一个元素
            $current->next = $pre;
            // 保存上一个节点信息为自己, 为下一个元素指向使用
            $pre = $current;
            // 更新当前操作的元素
            $current = $next;
        }
        // 更新头节点指向最后一个元素
        $this->head->next = $pre;
        return  $this;
    }
}

$linkedList = new SingleLinkedList();
$linkedList->insert(1)
    ->insert(2)
    ->insert(['a', 'b', 'c'])
    ->headInsert(-1)
    ->insert(100)
    ->reverse()
    ->print();