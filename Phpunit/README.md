# PHP-单元测试
##一、安装
###项目安装
```
composer require --dev phpunit/phpunit
```

##开始
###基本格式
- 针对类 Class 的测试写在类 ``ClassTest``中。
- ClassTest``（通常）继承自 ``PHPUnit\Framework\TestCase。
- 测试都是命名为 test* 的公用方法也可以在方法的文档注释块(docblock)中使用 @test 标注将其标记为测试方法

创建文件
```
mkdir tests         --新建目录
cd tests            --进入目录
touch StackTest.php --创建文件
```
实例1
```
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
}
```
```$xslt
assertEquals(mixed $expected, mixed $actual[, string $message = ''])
assertEquals 当两个变量 $expected 和 $actual 不相等时报告错误，错误讯息由 $message 指定
```
> 然后我们运行
`./vendor/bin/phpunit  tests/StackTest.php`

```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 00:00.334, Memory: 4.00 MB

OK (1 test, 1 assertion)

```
> 成功！这时候我们来改下代码,增加一个方法
```$xslt
/**
 * 测试相等性
 * @test
 */
public function testEquals2()
{
    $stack = 1;
    $this->assertEquals(0, $stack);
}
```
> 再次运行 ` ./vendor/bin/phpunit  tests/StackTest.php`
```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

.F                                                                  2 / 2 (100%)

Time: 00:00.077, Memory: 4.00 MB

There was 1 failure:

1) tests\StackTest::testEquals2
Failed asserting that 1 matches expected 0.

D:\Site\study-php\Phpunit\tests\StackTest.php:24

FAILURES!
Tests: 2, Assertions: 2, Failures: 1.
```
> 很明显看见报错了`Failed asserting that 1 matches expected 0` 断言1与预期的0匹配失败。
> 对于每个测试的运行，PHPUnit 命令行工具输出一个字符来指示进展

> `.` 当测试成功时输出。
>
> `F` 当测试方法运行过程中一个断言失败时输出。
>
> `E` 当测试方法运行过程中产生一个错误时输出。
>
> `R` 当测试被标记为有风险时输出。
>
> `S` 当测试被跳过时输出。
>
> `I` 当测试被标记为不完整或未实现时输出。

##依赖关系
> PHPUnit支持对测试方法之间的显式依赖关系进行声明。这种依赖关系并不是定义在测试方法的执行顺序中，这项功能我们不需要编写任何代码，只需要为主法加上一个注解名就可以。

> 创建 RelyonTest.php 文件 
```$xslt
namespace tests;

use PHPUnit\Framework\TestCase;

class RelyonTest extends TestCase
{
    public function testEmpty()
    {
        $stack = [];
        $this->assertEmpty($stack);

        return $stack;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $stack)
    {
        array_push($stack, 'foo');
        $this->assertNotEmpty($stack);
        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $stack)
    {
        $this->assertEquals('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }
}
```
```
assertEmpty(mixed $actual[, string $message = ''])
当 $actual 非空时报告错误，错误讯息由 $message 指定。
assertNotEmpty() 是与之相反的断言，接受相同的参数
```

> 运行 `./vendor/bin/phpunit  tests/RelyonTest.php`

```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

...                                                                 3 / 3 (100%)

Time: 00:00.022, Memory: 4.00 MB

OK (3 tests, 4 assertions)
```
> 在上例中，第一个测试， testEmpty()，创建了一个新数组，并断言其为空。随后，此测试将此基境作为结果返回。第二个测试，testPush()，依赖于 testEmpty() ，并将所依赖的测试之结果作为参数传入。最后，testPop() 依赖于 testPush()










