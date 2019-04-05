<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

class SwitchElement extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        if (!isset($markup->value)) {
            return 'value not set';
        }
        if (!isset($markup->case)) {
            return 'case not set';
        }
        $value = (string)self::renderElements($markup->value);
        if (isset($markup->case->$value)) {
            Stack::offsetIndent(1);
            $result = parent::renderElements($markup->case->$value);
            Stack::offsetIndent(-1);
            return $result;
        }
        if (isset($markup->case->default)) {
            Stack::offsetIndent(1);
            $result = parent::renderElements($markup->case->default);
            Stack::offsetIndent(-1);
            return $result;
        }
        return '';
    }
}