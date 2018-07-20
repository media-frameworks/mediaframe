<?php

namespace Mediaframe\Element\Basic;

use Mediaframe\Element\Basic;
use Mediaframe\Element\Attribute;

class Link extends Basic
{
    CONST DEFAULT_TYPE = 'text/css';
    CONST DEFAULT_REL = 'stylesheet';
    CONST SUPPORTED_ATTRS = array(
        "crossorigin",
        "href",
        "hreflang",
        "integrity",
        "media",
        "sizes",
        "type",
    );
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

    public function auto_render()
    {
        return true;
    }

    public function getSupportedAtttributes()
    {
        return self::$supportedAttrs;
    }

}

Link::initAttrs();
