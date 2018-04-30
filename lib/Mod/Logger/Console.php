<?php

namespace Mod\Logger;

class Console extends LoggerInterface
{
    protected $injectors = array(
        'auto_write' => true
    );

    public function write()
    {
        print join(PHP_EOL, $this->formattedMessages()) . PHP_EOL;
    }
}