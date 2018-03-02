<?php

namespace Mediaframe\Element\Basic;

use Mediaframe\Element\Basic;
use Mediaframe\Element\Attribute;
use Mediaframe\Stack;

class Heading extends Basic
{
    CONST SUPPORTED_ATTRS = array();

    static private $supportedAttrs = null;

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    static public function initAttrs()
    {
        self::$supportedAttrs = array_merge(
            self::SUPPORTED_ATTRS,
            Attribute::GLOBAL_ATTRS,
            Attribute::EVENT_ATTRS
        );
        self::$supportedAttrs = array_flip(self::$supportedAttrs);
    }

    public function render($markup)
    {
        $indent = self::getIndent($markup);
        $heading_text = Stack::renderText($markup);

        $attributes = Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result = $indent . '<' . $this->tag_name . $attributes . '>' . "\n";
        $result .= $heading_text;
        $result .= $indent . '</' . $this->tag_name . '>' . "\n";
        return $result;
    }

}
