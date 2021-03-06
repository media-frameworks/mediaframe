<?php

namespace Mediaframe\Element\Basic;

use Mediaframe\Element\Basic;
use Mediaframe\Stack;

class Head extends Basic
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($script)
    {
        $indent = self::getIndent();
        $elements = parent::renderElements($script);
        $classes = Stack::renderClasses();
        $result = "\n" . $indent . '<head>' . "\n";
        $result .= $elements;
        $result .= $classes . "\n";
        $result .= $indent . '</head>';
        return $result;
    }

}
