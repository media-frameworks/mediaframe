<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element;
use Mediaframe\Element\Code;
use Mediaframe\Stack;

class Constant extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        foreach ($markup as $name => $value) {
            $value = Element::renderElements($value);
            Stack::setConstant($name, $value);
            if (is_array($value)) {
                foreach ($value as $k => $v) {
                    Stack::setConstant($name . '[' . $k . ']', $v);
                }
            } else if (is_object($value)) {
                foreach ($value as $k => $v) {
                    Stack::setConstant($name . '->' . $k, $v);
                }
            }
        }
        Stack::shareFrame();
        return '';
    }
}
