<?php

namespace decorator;

class BasicPulisher implements PulisherInterface
{

    public function pulishText()
    {
        echo '这是文本组件' . PHP_EOL;
    }

}