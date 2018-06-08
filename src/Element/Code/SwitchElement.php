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
            return parent::renderElements($markup->case->$value);
        }
        if (isset($markup->case->default)) {
            return parent::renderElements($markup->case->default);
        }
        return '';
    }
}