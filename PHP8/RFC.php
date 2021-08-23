<?php

class Top
{
    public function getTop()
    {
        echo 'my name is getTop';
    }
}

trait My
{
    public function getMy()
    {
        echo 'my name is getMy';
    }
}

/**
 * @host www.yzmedu.com
 */
//class Person extends Top
//{
//    public static $sex = 'nan';
//    public $name;
//    public $age;
//    const HOST = 'www.yzmedu.com';
//
//    public function __construct($n, $a)
//    {
//        $this->name = $n;
//        $this->age = $a;
//    }
//
//    public function say()
//    {
//        echo "my name is {$this->name},my age is {$this->age}";
//    }
//
//    public static function show()
//    {
//        echo "my name is php8";
//    }
//
//    use My;
//}

class Person
{
    public $name;
    public $age;

    public function __construct($n, $a)
    {
        $this->name = $n;
        $this->age = $a;
    }
}

$rf = new ReflectionClass('Person');

echo "<pre>";
print_r($rf->getConstructor());
echo "</pre>";

$rf = new ReflectionClass('Person');
echo $rf->getName();




















