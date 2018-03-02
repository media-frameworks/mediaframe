<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

class Service extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        foreach ($markup as $name => $value) {
            Stack::setService($name, $value);
        }
        Stack::shareFrame();
        return '';
    }
}
