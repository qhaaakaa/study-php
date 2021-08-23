<?php
//现在可以编写 catch (Exception) 代码来捕获异常而不必将其存储到一个变量中：
declare(strict_types=1);

$nullableValue = null;

try {
    $value = $nullableValue ?? throw new \InvalidArgumentException();
} catch (\InvalidArgumentException) {
    var_dump("Something went wrong");
}

exit;