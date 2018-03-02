<?php

namespace Mediaframe\Element\Forms;

use Mediaframe\Element\Forms;
use Mediaframe\Element\Attribute;

class Button extends Forms
{
    CONST SUPPORTED_ATTRS = array(
        "autofocus",
        "disabled",
        "form",
        "formaction",
        "formenctype",
        "formmethod",
        "formnovalidate",
        "formtarget",
        "name",
        "type",
        "value"
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
        $result = $indent . '<button';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>';
        $result .= $elements;
        $result .= '</button>' . "\n";
        return $result;
    }
}

Button::initAttrs();
