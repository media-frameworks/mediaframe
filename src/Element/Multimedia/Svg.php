<?php

namespace Mediaframe\Element\Multimedia;

use Mediaframe\Element\Multimedia;
use Mediaframe\Element\Attribute;

class Svg extends Multimedia
{
    CONST SUPPORTED_ATTRS = array();

    static private $supportedAttrs = null;

    static public function initAttrs()
    {
        self::$supportedAttrs = array_merge(
            Attribute::GLOBAL_ATTRS
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

Svg::initAttrs();
