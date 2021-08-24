<?php

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

class lists
{
    public $head;
    public $length = 0;

    public function __construct()
    {
        $this->head = new Node(null);
    }

    public function add($data)
    {
        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }
        $current->next = new Node($data);
        $this->length++;
    }

    public function getAll()
    {
        $current = $this->head;
        while ($current->next != null) {
            $current = $current->next;
            print_r($current->data);
            echo "<br />";
        }
    }

    public function update($index, $data)
    {
        $current = $this->head;
        $i = 0;
        while ($i != $index) {
            $current = $current->next;
            $i++;
        }
        $current->data = $data;
    }

    public function delete($index)
    {
        $current = $this->head;
        $i = 0;
        while ($i < $index) {
            $current = $current->next;
            $i++;
        }
        $current->next = $current->next->next;
        $this->length--;
    }

    public function reverse()
    {
        // 从第一个元素开始遍历
        $current = $this->head->next;
        $pre = null;
        while ($current != null) {
            // 将当前节点的next指向下一个元素
            $next = $current->next;
            // 当前头部第一次节点为null
            $current->next = $pre;
            // 保存当前节点
            $pre = $current;
            //移动到下一个节点
            $current = $next;
        }
        // 更新头节点指向最后一个元素
        $this->head->next = $pre;
        return $this;
    }

}

$class = new Lists();
$class->add(2);
$class->add(4);
$class->add(3);
//$class->reverse();
//$class->getAll();


$class2 = new Lists();
$class2->add(5);
$class2->add(6);
$class2->add(4);
//$class->reverse();
//$class2->getAll();
//数据结构 求和
function addTwoNumbers($l1, $l2)
{
    $obj = null;
    $additional = 0;
    while ($l1 || $l2 || $additional) {
        $value = $l1->data + $l2->data + $additional;
        if ($value < 10) {
            $additional = 0;
        } else {
            $value -= 10;
            $additional = 1;
        }
        $tmp_obj = new Node($value);

        if (is_null($obj)) {
            $obj = $tmp_obj;
        } else {
            $next->next = $tmp_obj;
        }
        $next = $tmp_obj;

        $l1 = $l1->next;
        $l2 = $l2->next;
    }
    return $obj;
}


$a = addTwoNumbers($class->head->next, $class2->head->next);

print_r($a);




