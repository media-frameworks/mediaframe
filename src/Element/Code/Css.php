<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

class Css extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        foreach ($markup as $name => $value) {
            Stack::setClass($name, $value);
        }
        Stack::shareFrame();
        return '';
    }
}
