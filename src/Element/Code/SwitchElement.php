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
        $cases = array();
        foreach ($markup->case as $case_value => $case_render){
            $cases[Stack::valueSubstitutions($case_value)] = $case_render;
        }
        if (isset($cases[$value])) {
            Stack::offsetIndent(1);
            $result = parent::renderElements($cases[$value]);
            Stack::offsetIndent(-1);
            return $result;
        }
        if (isset($cases['default'])) {
            Stack::offsetIndent(1);
            $result = parent::renderElements($cases['default']);
            Stack::offsetIndent(-1);
            return $result;
        }
        return '';
    }
}