<?php

namespace Mediaframe\Element\Forms;

use Mediaframe\Element\Forms;
use Mediaframe\Element\Attribute;

class Form extends Forms
{
    CONST SUPPORTED_ATTRS = array(
        "accept-charset",
        "action",
        "autocomplete",
        "enctype",
        "method",
        "name",
        "novalidate",
        "target"
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

    public function render_indent()
    {
        return false;
    }

    public function getSupportedAtttributes()
    {
        return self::$supportedAttrs;
    }
}

Form::initAttrs();
