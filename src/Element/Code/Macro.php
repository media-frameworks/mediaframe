<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

class Macro extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        foreach ($markup as $name => $value) {
            if (is_object($value)) {
                $value->__FRAME_INDEX__ = Stack::$frame_index;
            }
            Stack::setMacro($name, $value);
        }
        Stack::shareFrame();
        return '';
    }
}
