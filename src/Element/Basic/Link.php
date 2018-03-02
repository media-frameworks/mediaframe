<?php

namespace Mediaframe\Element\Basic;

use Mediaframe\Element\Basic;

class Link extends Basic
{
    CONST DEFAULT_TYPE = 'text/css';
    CONST DEFAULT_REL = 'stylesheet';
    CONST SUPPORTED_ATTRS = array(
        "crossorigin",
        "href",
        "hreflang",
        "media",
        "sizes",
        "type",
    );

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    private function createLink($mark)
    {
        $indent = self::getIndent();
        $rel = isset ($mark->rel) ?: self::DEFAULT_REL;
        $type = isset ($mark->type) ?: self::DEFAULT_TYPE;
        $result = $indent . '<link type="' . $type . '" rel="' . $rel . '"';
        foreach (self::SUPPORTED_ATTRS as $attr) {
            if (!isset($mark->$attr)) {
                continue;
            }
            $result .= ' ' . $attr . '="' . $mark->$attr . '"';
        }
        return $result . '/>' . "\n";
    }

    public function render($markup)
    {
        $result = '';
        if (is_array($markup->href)) {
            foreach ($markup->href as $href) {
                $mark = $markup;
                $mark->href = $href;
                $result .= $this->createLink($mark);
            }
        } else {
            $result .= $this->createLink($markup);
        }
        return $result;
    }

}
