<?php

namespace Mediaframe\Element\Semantic;

use Mediaframe\Element\Semantic;
use Mediaframe\Element\Attribute;

class IFrame extends Semantic
{
    CONST SUPPORTED_ATTRS = array(
        "height",
        "name",
        "sandbox",
        "src",
        "srcdoc",
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

IFrame::initAttrs();
