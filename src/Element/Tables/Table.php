<?php

namespace Mediaframe\Element\Tables;

use Mediaframe\Element\Tables;
use Mediaframe\Element\Attribute;

class Table extends Tables
{
    static private $supportedAttrs = null;

    static public function initAttrs()
    {
        self::$supportedAttrs = array_merge(
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
        $result = $indent . '<table';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>';
        if (strlen($elements)) {
            $result .= "\n" . $elements . $indent;
        }
        $result .= '</table>' . "\n";
        return $result;
    }
}

Table::initAttrs();
