<?php

namespace decorator;

class MoviePulisher extends PulisherDerector
{

    public function pulishText()
    {
        $this->addMovieCompnent();
        parent::pulishText();
    }

    public function addMovieCompnent()
    {
        echo '添加电影组件' . PHP_EOL;
    }

}