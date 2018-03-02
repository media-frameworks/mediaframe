<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;
use Mediaframe\Element;

class Data extends Code
{

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        if (!is_object($markup)) {
            return "markup is not an object";
        }
        foreach ($markup as $name => $value) {
            Stack::setData($name, $value);
        }
        Stack::shareFrame();
    }
}