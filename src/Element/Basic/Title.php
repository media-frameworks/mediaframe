<?php

namespace Mediaframe\Element\Basic;

use Mediaframe\Element\Basic;
use Mediaframe\Stack;

class Title extends Basic
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($title)
    {
        $indent = self::getIndent($title);
        $title_text = Stack::renderText($title);
        return $indent . '<title>' . $title_text . '</title>' . "\n";
    }

}
