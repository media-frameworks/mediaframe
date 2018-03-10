<?php

namespace Mediaframe\Element\Semantic;

use Mediaframe\Element\Semantic;
use Mediaframe\Element\Attribute;
use Mediaframe\Stack;

class Span extends Semantic
{
    CONST SUPPORTED_ATTRS = array();

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
        $result = "\n" . $indent . '<span';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>';
        if (strlen($elements)) {
            $result .= $elements;
        }
        $result .= '</span>';
        return $result;
    }
}

Span::initAttrs();
