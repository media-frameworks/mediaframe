<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/23/2017
 * Time: 10:42 PM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;
use Mediaframe\Stack;

abstract class Attribute extends Element
{
    CONST GLOBAL_ATTRS = array(
        "accesskey",
        "class",
        "contenteditable",
        "contextmenu",
        "data-",
        "dir",
        "draggable",
        "dropzone",
        "hidden",
        "id",
        "lang",
        "spellcheck",
        "style",
        "tabindex",
        "title",
        "tooltip",
        "translate"
    );
    CONST EVENT_ATTRS = array(
        "onafterprint",
        "onbeforeprint",
        "onbeforeunload",
        "onerror",
        "onhashchange",
        "onload",
        "onmessage",
        "onoffline",
        "ononline",
        "onpagehide",
        "onpageshow",
        "onpopstate",
        "onresize",
        "onstorage",
        "onunload",
        "onblur",
        "onchange",
        "oncontextmenu",
        "onfocus",
        "oninput",
        "oninvalid",
        "onreset",
        "onsearch",
        "onselect",
        "onsubmit",
        "onkeydown",
        "onkeypress",
        "onkeyup",
        "onclick",
        "ondblclick",
        "onmousedown",
        "onmousemove",
        "onmouseout",
        "onmouseover",
        "onmouseup",
        "onmousewheel",
        "onwheel",
        "ondrag",
        "ondragend",
        "ondragenter",
        "ondragleave",
        "ondragover",
        "ondragstart",
        "ondrop",
        "onscroll",
        "oncopy",
        "oncut",
        "onpaste",
        "onabort",
        "oncanplay",
        "oncanplaythrough",
        "oncuechange",
        "ondurationchange",
        "onemptied",
        "onended",
        "onerror",
        "onloadeddata",
        "onloadedmetadata",
        "onloadstart",
        "onpause",
        "onplay",
        "onplaying",
        "onprogress",
        "onratechange",
        "onseeked",
        "onseeking",
        "onstalled",
        "onsuspend",
        "ontimeupdate",
        "onvolumechange",
        "onwaiting",
        "onshow",
        "ontoggle"
    );

    private static function renderStyles($styles)
    {
        if (!is_object($styles)) {
            $class = Stack::getClass($styles);
            if (!$class) {
                return $styles;
            }
            $styles = $class;
        }
        $result = '';
        foreach ($styles as $name => $value) {
            $result .= $name . ': ' . $value . '; ';
        }
        return $result;
    }

    private static function attrIsBoolean($attr)
    {
        switch ($attr) {
            case 'controls':
            case 'checked':
            case 'disabled':
            case 'multiple':
            case 'formnovalidate':
            case 'required':
                return true;
            default:
                return false;
        }
    }

    private static function transformAttr($name)
    {
        if ($name == 'tooltip') {
            return 'title';
        }
        return $name;
    }

    public static function renderAttributes($script, $attrs)
    {
        $result = '';
        if (!is_object($script)) {
            return $result;
        }
        foreach ($script as $name => $value) {
            $attr = $name;
            if (0 === strpos($name, 'data-')) {
                $name = "data-";
            }
            if (!isset($attrs[$name])) {
                continue;
            }
            if ($name == 'style') {
                $value = self::renderStyles($value);
            }
            if (self::attrIsBoolean($name)) {
                if (is_object($value)) {
                    $value = Element::renderElements($value);
                }
                switch ($value) {
                    case "true":
                    case "1":
                    case true:
                        $result .= ' ' . $name;
                        break;
                    case "false":
                    case "0":
                    case false:
                    default:
                        break;
                }
            } else {
                if ($attr == 'class') {
                    $value = strtolower($value);
                }
                $result .= ' ' . self::transformAttr($attr) . '="' . str_replace('"', '&quot;', $value) . '"';
            }
        }
        return $result;
    }
}