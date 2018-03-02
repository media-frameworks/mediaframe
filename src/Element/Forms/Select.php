<?php

namespace Mediaframe\Element\Forms;

use Mediaframe\Element\Forms;
use Mediaframe\Element\Attribute;

class Select extends Forms
{
    CONST SUPPORTED_ATTRS = array(
        "autofocus",
        "disabled",
        "form",
        "multiple",
        "name",
        "required",
        "size"
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
        $result = $indent . '<select';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>' . "\n" . $indent . '</select>';
        return $result;
    }
}

Select::initAttrs();
