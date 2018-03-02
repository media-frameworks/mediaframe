<?php

namespace Mediaframe\Element\Semantic;

use Mediaframe\Element\Semantic;
use Mediaframe\Element\Attribute;
use Mediaframe\Stack;

class Div extends Semantic
{
    CONST SUPPORTED_ATTRS = array(
        "async",
        "charset",
        "defer",
        "src"
    );

    static private $supportedAttrs = null;

    static public function initAttrs()
    {
        self::$supportedAttrs = array_merge(
            self::SUPPORTED_ATTRS,
            Attribute::GLOBAL_ATTRS,
            Attribute::EVENT_ATTRS
        );
        self::$supportedAttrs = array_flip(self::$supportedAttrs);
    }

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        $indent = self::getIndent();
        $elements = parent::renderElements($markup);
        $result = $indent . '<div';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>';
        if (strlen($elements)) {
            $result .= "\n" . $elements . $indent;
        }
        if (isset ($markup->text)) {
            $text = Stack::renderText($markup->text);
            $result .= $text;
        }
        $result .= '</div>' . "\n";
        return $result;
    }
}

Div::initAttrs();
