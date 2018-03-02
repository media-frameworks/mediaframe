<?php

namespace Mediaframe\Element\Basic;

use Mediaframe\Element\Basic;
use Mediaframe\Element\Attribute;

class Body extends Basic
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
        $attributes = Attribute::renderAttributes($markup, self::$supportedAttrs);
        $elements = parent::renderElements($markup);
        $result = $indent . '<body' . $attributes . '>' . "\n";
        $result .= $elements;
        $result .= $indent . '</body>' . "\n";
        return $result;
    }

}

Body::initAttrs();
