<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

class VarDump extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        $expression = Stack::valueSubstitutions($markup);
        if (!is_string($expression)) {
            $expression = self::renderElements($markup);
        }
        var_dump($expression);
        return '';
    }
}

