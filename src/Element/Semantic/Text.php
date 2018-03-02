<?php

namespace Mediaframe\Element\Semantic;

use Mediaframe\Element\Semantic;
use Mediaframe\Element\Attribute;
use Mediaframe\Stack;

class Text extends Semantic
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        $indent = self::getIndent();
        return "\n" . $indent . Stack::renderText($markup);
    }
}
