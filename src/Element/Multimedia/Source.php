<?php

namespace Mediaframe\Element\Multimedia;

use Mediaframe\Element\Multimedia;
use Mediaframe\Element\Attribute;

class Source extends Multimedia
{
    CONST SUPPORTED_ATTRS = array(
        "src",
        "srcset",
        "media",
        "type",
        "width",
        "height"
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
        $result = "\n" . $indent . '<source';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>' . "\n";
        return $result;
    }

}

Source::initAttrs();
