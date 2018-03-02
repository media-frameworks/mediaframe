<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;
use Mediaframe\Element;

class IssetTest extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        if (!isset($markup->key)) {
            return 'key not set';
        }
        $constant_set = Stack::getConstant($markup->key);
        $var_set = Stack::getVar($markup->key);
        if (!$constant_set && !$var_set) {
            if (isset($markup->false)){
                return Element::renderElements($markup->false);
            }
            return '';
        }
        if (isset($markup->true)){
            return Element::renderElements($markup->true);
        }
        return '';
    }
}
