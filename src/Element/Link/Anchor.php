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

    public function auto_render()
    {
        return true;
    }

    public function getSupportedAtttributes()
    {
        return self::$supportedAttrs;
    }
}

Anchor::initAttrs();
