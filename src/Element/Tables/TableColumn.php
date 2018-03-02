<?php

namespace Mediaframe\Element\Tables;

use Mediaframe\Element\Tables;
use Mediaframe\Element\Attribute;

class TableColumn extends Tables
{
    CONST SUPPORTED_ATTRS = array(
        "colspan",
        "rowspan",
        "headers",
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
        $result = $indent . '<td';
        $result .= Attribute::renderAttributes($markup, self::$supportedAttrs);
        $result .= '>';
        if (strlen($elements)) {
            $result .= "\n" . $elements . $indent;
        }
        if (isset ($markup->text)) {
            $result .= $markup->text;
        }
        $result .= '</td>' . "\n";
        return $result;
    }
}

TableColumn::initAttrs();
