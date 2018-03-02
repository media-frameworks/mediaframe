<?php

namespace Mediaframe\Element\Image;

use Mediaframe\Element\Image;
use Mediaframe\Element\Attribute;

class Img extends Image
{
    CONST SUPPORTED_ATTRS = array(
        "alt",
        "crossorigin",
        "height",
        "ismap",
        "longdesc",
        "src",
        "srcset",
        "usemap",
        "width"
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
        $result = $indent . '<img';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>' . "\n";
        return $result;
    }
}

Img::initAttrs();
