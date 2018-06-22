<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

class Variable extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        foreach ($markup as $name => $value) {
            if (is_object($value)) {
                if (isset($value->eval)) {
                    $call = '$_x=' . $value->eval . ';';
                    $call = Stack::valueSubstitutions($call);
                    eval($call);
                    Stack::setVar($name, $_x);
                }
            }
            Stack::setVar($name, Stack::valueSubstitutions($value));
        }
        Stack::shareFrame();
        return '';
    }
}
