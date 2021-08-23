<?php
//PHP 8 引入了新的名为 mixed 的类型，该类型等价于
//array|bool|callable|int|float|null|object|resource|string

declare(strict_types=1);

function debug_function(mixed ...$data)
{
    var_dump($data);
}

debug_function(1, 'string', []);

exit;