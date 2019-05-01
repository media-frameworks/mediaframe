<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

class Script extends Code
{
    CONST DEFAULT_TYPE = 'text/javascript';
    CONST SUPPORTED_ATTRS = array(
        "async",
        "charset",
        "defer",
        "src"
    );

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    private function openScriptTag($mark)
    {
        $indent = self::getIndent();
        $type = isset ($mark->type) ?: self::DEFAULT_TYPE;
        $result = "\n" . $indent . '<script type="' . $type . '"';
        foreach (self::SUPPORTED_ATTRS as $attr) {
            if (!isset($mark->$attr)) {
                continue;
            }
            $result .= ' ' . $attr . '="' . $mark->$attr . '"';
        }
        $result .= '>';
        return $result;
    }

    private function closeScriptTag()
    {
        return '</script>';
    }

    private function recurse_srcs($markup)
    {
        $result = '';
        foreach ($markup->src as $src) {
            $mark = $markup;
            $src = Stack::valueSubstitutions($src);
            if (!is_array($src)) {
                $srcs = [$src];
            } else {
                $srcs = $src;
            }
            foreach ($srcs as $src) {
                $mark->src = $src;
                $result .= $this->openScriptTag($mark);
                $result .= $this->closeScriptTag();
            }
        }
        return $result;
    }

    public function render($markup)
    {
        $result = '';
        if (isset($markup->src)) {
            if (is_array($markup->src)) {
                $result .= $this->recurse_srcs($markup);
            } else {
                $result .= $this->openScriptTag($markup);
                $result .= $this->closeScriptTag();
            }
        }
        $indent = self::getIndent();
        unset($markup->src);
        if (isset ($markup->code)) {
            $result .= $this->openScriptTag($markup);
            if (is_array($markup->code)) {
                foreach ($markup->code as $line) {
                    if (!is_string($line)) {
                        $result .= parent::renderElements($line);
                    } else {
                        $result .= "\n   " . $indent . $line;
                    }
                }
                $result .= "\n" . $indent;
            } else {
                $result .= $markup->code;
            }
            $result .= $this->closeScriptTag();
        }
        return $result;
    }
}
