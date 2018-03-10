<?php

namespace Mediaframe\Element\Lists;

use Mediaframe\Element\Lists;
use Mediaframe\Element\Attribute;

class ListItem extends Lists
{
    CONST SUPPORTED_ATTRS = array(
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
        $result = $indent . '<li';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>';
        if (strlen($elements)) {
            $result .= "\n" . $elements;
        }
        $result .= $indent . '</li>' . "\n";
        return $result;
    }
}

ListItem::initAttrs();
