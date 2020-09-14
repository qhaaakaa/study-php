# PHP-单元测试
##一、安装
###项目安装
```
composer require --dev phpunit/phpunit
```

##二、开始
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
> PHPUnit支持对测试方法之间的显式依赖关系进行声明。
> 这种依赖关系并不是定义在测试方法的执行顺序中，这项功能我们不需要编写任何代码，只需要为主法加上一个注解名`@depends`就可以。

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

##数据供给器
> 测试方法可以接受任意参数。这些参数由数据供给器方法。
> 用 `@dataProvider` 标注来指定使用哪个数据供给器方法。
> 数据供给器方法必须声明为 public，其返回值要么是一个数组，其每个元素也是数组；要么是一个实现了 Iterator 接口的对象，在对它进行迭代时每步产生一个数组

> 创建 DataTest.php 文件
```$xslt
<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3]
        ];
    }
}
```
> 运行 `./vendor/bin/phpunit  tests/DataTest.php`

```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

...F                                                                4 / 4 (100%)

Time: 00:00.466, Memory: 4.00 MB

There was 1 failure:

1) tests\DataTest::testAdd with data set #3 (1, 1, 3)
Failed asserting that 2 matches expected 3.

D:\Site\study-php\Phpunit\tests\DataTest.php:14

FAILURES!
Tests: 4, Assertions: 4, Failures: 1.
```
> 当使用到大量数据集时，最好逐个用字符串键名对其命名，
> 避免用默认的数字键名。这样输出信息会更加详细些，其中将包含打断测试的数据集所对应的名称。

```$xslt
<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public function additionProvider()
    {
        return [
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one'  => [1, 1, 3]
        ];
    }
}
```
> 运行 `./vendor/bin/phpunit  tests/DataTest.php`

```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

...F                                                                4 / 4 (100%)

Time: 00:00.022, Memory: 4.00 MB

There was 1 failure:

1) tests\DataTest::testAdd with data set "one plus one" (1, 1, 3)
Failed asserting that 2 matches expected 3.

D:\Site\study-php\Phpunit\tests\DataTest.php:14

FAILURES!
Tests: 4, Assertions: 4, Failures: 1.
```
> 如果测试同时从 @dataProvider 方法和一个或多个 @depends 测试接收数据，
> 那么来自于数据供给器的参数将先于来自所依赖的测试的。
> 来自于所依赖的测试的参数对于每个数据集都是一样的。


> 创建 ProviderTest.php 文件
```$xslt
<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class ProviderTest extends TestCase
{
    public function provider()
    {
        return [['provider1'], ['provider2']];
    }

    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends      testProducerFirst
     * @depends      testProducerSecond
     * @dataProvider provider
     */
    public function testConsumer()
    {
        $this->assertEquals(
            ['provider1', 'first', 'second'],
            func_get_args()
        );
    }
}
```
> 运行 ` ./vendor/bin/phpunit  tests/ProviderTest.php`
```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

...F                                                                4 / 4 (100%)

Time: 00:00.026, Memory: 4.00 MB

There was 1 failure:

1) tests\ProviderTest::testConsumer with data set #1 ('provider2')
Failed asserting that two arrays are equal.
--- Expected
+++ Actual
@@ @@
 Array (
-    0 => 'provider1'
+    0 => 'provider2'
     1 => 'first'
     2 => 'second'
 )

D:\Site\study-php\Phpunit\tests\ProviderTest.php:35

FAILURES!
Tests: 4, Assertions: 4, Failures: 1.
```

> 如果一个测试依赖于另外一个使用了数据供给器的测试，仅当被依赖的测试至少能在一组数据上成功时，依赖于它的测试才会运行。使用了数据供给器的测试，其运行结果是无法注入到依赖于此测试的其他测试中的。

##对异常进行测试
> 新建 `ExceptionTest.php`
```$xslt
<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
    }
}
```
> 运行 ` ./vendor/bin/phpunit  tests/ExceptionTest.php`
```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

F                                                                   1 / 1 (100%)

Time: 00:00.043, Memory: 4.00 MB

There was 1 failure:

1) tests\ExceptionTest::testException
Failed asserting that exception of type "tests\InvalidArgumentException" is thrown.

FAILURES!
Tests: 1, Assertions: 1, Failures: 1.
```
> 除了 expectException() 方法外，还有 expectExceptionCode()、
> expectExceptionMessage() 和 expectExceptionMessageRegExp() 
> 方法可以用于为被测代码所抛出的异常建立预期。
> 或者，也可以用 @expectedException、@expectedExceptionCode、
> @expectedExceptionMessage 和 @expectedExceptionMessageRegExp 
> 标注来为被测代码所抛出的异常建立预期。

```$xslt
/**
 * @expectedException InvalidArgumentException
 */
public function testException()
{
}
```

```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

R                                                                   1 / 1 (100%)

Time: 00:00.033, Memory: 4.00 MB

There was 1 risky test:

1) tests\ExceptionTest::testException
This test did not perform any assertions

D:\Site\study-php\Phpunit\tests\ExceptionTest.php:13

OK, but incomplete, skipped, or risky tests!
Tests: 1, Assertions: 0, Risky: 1.
```

##对 PHP 错误进行测试
> 默认情况下，PHPUnit 将测试在执行中触发的 PHP 错误、警告、通知都转换为异常。
> 利用这些异常，就可以，比如说，预期测试将触发PHP错误比如加载了一个不存在的文件

> 创建 ExpectedErrorTest.php 文件 

```$xslt
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
```
> 运行 ` ./vendor/bin/phpunit  tests/ExpectedErrorTest.php`
```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

E                                                                   1 / 1 (100%)

Time: 00:00.045, Memory: 4.00 MB

There was 1 error:

1) tests\ExpectedErrorTest::testFailingInclude
include(not_existing_file.php): failed to open stream: No such file or directory

D:\Site\study-php\Phpunit\tests\ExpectedErrorTest.php:14
D:\Site\study-php\Phpunit\tests\ExpectedErrorTest.php:14

ERRORS!
Tests: 1, Assertions: 0, Errors: 1.
```

##对输出进行测试
> 有时候，想要断言（比如说）某方法的运行过程中生成了预期的输出（例如，通过echo或print）。
> PHPUnit\Framework\TestCase类使用PHP的输出缓冲特性来为此提供必要的功能支持。
> 通过expectOutputString()方法来设定所预期的输出。如果没有产生预期的输出，测试将计为失败。

>创建 OutputTest.php
```$xslt
<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class OutputTest extends TestCase
{
    public function testExpectFooActualFoo()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }

    public function testExpectBarActualBaz()
    {
        $this->expectOutputString('bar');
        print 'baz';
    }
}
```
> 运行 ``
```$xslt
PHPUnit 9.3.8 by Sebastian Bergmann and contributors.

.F                                                                  2 / 2 (100%)

Time: 00:00.453, Memory: 4.00 MB

There was 1 failure:

1) tests\OutputTest::testExpectBarActualBaz
Failed asserting that two strings are equal.
--- Expected
+++ Actual
@@ @@
-'bar'
+'baz'

FAILURES!
Tests: 2, Assertions: 2, Failures: 1.
```