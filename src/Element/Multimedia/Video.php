<?php

namespace Mediaframe\Element\Multimedia;

use Mediaframe\Element\Multimedia;
use Mediaframe\Element\Attribute;

class Video extends Multimedia
{
    CONST SUPPORTED_ATTRS = array(
        "autoplay",
        "controls",
        "height",
        "loop",
        "muted",
        "poster",
        "preload",
        "src",
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

    public function auto_render()
    {
        return true;
    }

    public function getSupportedAtttributes()
    {
        return self::$supportedAttrs;
    }
}

Video::initAttrs();
