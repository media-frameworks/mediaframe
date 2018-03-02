<?php

namespace Mediaframe\Element\Forms;

use Mediaframe\Element\Forms;
use Mediaframe\Element\Attribute;
use Mediaframe\Stack;

class Textarea extends Forms
{
    CONST SUPPORTED_ATTRS = array(
        "autofocus",
        "cols",
        "dirname",
        "disabled",
        "form",
        "name",
        "placeholder",
        "readonly",
        "required",
        "rows",
        "wrap"
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
        $result = $indent . '<textarea';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>';
        if (isset ($markup->text)) {
            $text = Stack::renderText($markup->text);
            $result .= $text;
        }
        $result .= '</textarea>' . "\n";
        return $result;
    }
}

Textarea::initAttrs();
