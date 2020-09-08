<?php

namespace decorator;

class PulisherDerector implements PulisherInterface
{

    protected $pulisher = null;

    function derect(PulisherInterface $pulisher)
    {
        $this->pulisher = $pulisher;
    }

    public function pulishText()
    {
        $this->pulisher->pulishText();
    }

}