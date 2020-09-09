<?php
/*男人这本书的内容要比封面吸引人；女人这本书的封面通常比内容更吸引人
男人成功时，背后多半有一个伟大的女人；女人成功时，背后多半有一个失败的男人
男人失败时，闷头喝酒，谁也不用劝；女人失败时，眼泪汪汪，谁也劝不了
男人恋爱时，凡事不懂也要装懂；女人恋爱时，遇事懂也要装作不懂*/

//抽象状态
abstract class State
{
    protected $state_name;

    //得到男人反应
    public abstract function GetManAction(VMan $elementM);

    //得到女人反应
    public abstract function GetWomanAction(VWoman $elementW);
}

//抽象人
abstract class Person
{
    public $type_name;

    public abstract function Accept(State $visitor);
}

//成功状态
class Success extends State
{
    public function __construct()
    {
        $this->state_name = "成功";
    }

    public function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，背后多半有一个伟大的女人。\n";
    }

    public function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name} :{$this->state_name}时，背后大多有一个不成功的男人。\n";
    }
}

//失败状态
class Failure extends State
{
    public function __construct()
    {
        $this->state_name = "失败";
    }

    public function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，闷头喝酒，谁也不用劝。\n";
    }

    public function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name} :{$this->state_name}时，眼泪汪汪，谁也劝不了。\n";
    }
}

//恋爱状态
class Amativeness extends State
{
    public function __construct()
    {
        $this->state_name = "恋爱";
    }

    public function GetManAction(VMan $elementM)
    {
        echo "{$elementM->type_name}:{$this->state_name}时，凡事不懂也要装懂。\n";
    }

    public function GetWomanAction(VWoman $elementW)
    {
        echo "{$elementW->type_name} :{$this->state_name}时，遇事懂也要装作不懂。\n";
    }
}

//男人
class VMan extends Person
{
    function __construct()
    {
        $this->type_name = "男人";
    }

    public function Accept(State $visitor)
    {
        $visitor->GetManAction($this);
    }
}

//女人
class VWoman extends Person
{
    public function __construct()
    {
        $this->type_name = "女人";
    }

    public function Accept(State $visitor)
    {
        $visitor->GetWomanAction($this);
    }
}

//对象结构
class ObjectStruct
{
    private $elements = array();

    //增加
    public function Add(Person $element)
    {
        array_push($this->elements, $element);
    }

    //移除
    public function Remove(Person $element)
    {
        foreach ($this->elements as $k => $v) {
            if ($v == $element) {
                unset($this->elements[$k]);
            }
        }
    }

    //查看显示
    public function Display(State $visitor)
    {
        foreach ($this->elements as $v) {
            $v->Accept($visitor);
        }
    }
}

$os = new ObjectStruct();
$os->Add(new VMan());
$os->Add(new VWoman());

//成功时反应
$ss = new Success();
$os->Display($ss);

//失败时反应
$fs = new Failure();
$os->Display($fs);

//恋爱时反应
$ats = new Amativeness();
