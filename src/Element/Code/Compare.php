<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;
use Mediaframe\Element;

class Compare extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        if (!isset($markup->operands)) {
            return 'operands not set';
        }
        if (!is_array($markup->operands)) {
            return 'operands must be an array';
        }
        if (count($markup->operands) < 2) {
            return 'more than one operand is required';
        }
        $operands = $markup->operands;
        $test_value = Stack::valueSubstitutions($operands[0]);
        $equals = true;
        foreach ($operands as $index => $value) {
            if (0 == $index) {
                continue;
            }
            $value = Stack::valueSubstitutions($value);
            if ($value != $test_value) {
                $equals = false;
            }
        }
        if ($equals) {
            if (isset($markup->equals)) {
                return Element::renderElements($markup->equals);
            }
        } else {
            if (isset($markup->not_equals)) {
                return Element::renderElements($markup->not_equals);
            }
        }
        return '';
    }
}
