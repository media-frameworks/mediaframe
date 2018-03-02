<?php

namespace Mediaframe\Element\Basic;

use Mediaframe\Element\Basic;

class Html extends Basic
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        $indent = self::getIndent();
        $elements = parent::renderElements($markup);
        $result = $indent . '<!DOCTYPE html>' . "\n";
        $result .= $indent . '<html>' . "\n";
        $result .= $elements;
        $result .= $indent . '</html>' . "\n";
        return $result;
    }

}
