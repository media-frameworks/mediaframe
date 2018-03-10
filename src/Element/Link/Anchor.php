<?php

namespace Mediaframe\Element\Link;

use Mediaframe\Element\Link;
use Mediaframe\Element\Attribute;

class Anchor extends Link
{
    CONST SUPPORTED_ATTRS = array(
        "download",
        "href",
        "hreflang",
        "media",
        "rel",
        "target",
        "type",
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
        $result = "\n" . $indent . '<a';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>';
        if (strlen($elements)) {
            $result .= $elements . "\n" . $indent;
        }
        $result .= '</a>';
        return $result;
    }

}

Anchor::initAttrs();
