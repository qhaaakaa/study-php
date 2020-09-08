<?php
namespace decorator;

class MusicPublisher extends PulisherDerector {


    public function pulishText() {
        $this->addMusicCompnent();
        parent::pulishText();
    }

    public function addMusicCompnent() {
        echo '添加音乐组件'.PHP_EOL;
    }

}