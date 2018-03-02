<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/23/2017
 * Time: 8:30 PM
 */

namespace Mediaframe;

abstract class Element
{
    CONST BASE_CLASS_ELEMENT = 'Mediaframe\Element\\';

    CONST ELEMENT_BASIC_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Basic';
    CONST ELEMENT_FORMAT_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Format';
    CONST ELEMENT_FORM_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Forms';
    CONST ELEMENT_FRAME_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Frame';
    CONST ELEMENT_IMAGE_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Image';
    CONST ELEMENT_MULTIMEDIA_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Multimedia';
    CONST ELEMENT_LINK_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Link';
    CONST ELEMENT_LIST_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Lists';
    CONST ELEMENT_TABLE_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Tables';
    CONST ELEMENT_SEMANTIC_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Semantic';
    CONST ELEMENT_CODE_CLASS_NAME = self::BASE_CLASS_ELEMENT . 'Code';

    CONST ELEMENT_CLASS_ROOTS = array(
        self::ELEMENT_BASIC_CLASS_NAME,
        self::ELEMENT_FORMAT_CLASS_NAME,
        self::ELEMENT_FORM_CLASS_NAME,
        self::ELEMENT_FRAME_CLASS_NAME,
        self::ELEMENT_IMAGE_CLASS_NAME,
        self::ELEMENT_MULTIMEDIA_CLASS_NAME,
        self::ELEMENT_LINK_CLASS_NAME,
        self::ELEMENT_LIST_CLASS_NAME,
        self::ELEMENT_TABLE_CLASS_NAME,
        self::ELEMENT_SEMANTIC_CLASS_NAME,
        self::ELEMENT_CODE_CLASS_NAME,
    );

    static $tagNameMap = array();
    static $tagInstanceMap = array();

    protected $tag_name;

    public function __construct($tag_name)
    {
        $this->tag_name = $tag_name;
    }

    abstract public function render($frame);

    static protected function getIndent($add_some = 0)
    {
        return Stack::getIndent($add_some);
    }

    /** @var Element $element */
    static private function renderElement($element, $markup)
    {
        $source = self::renderComments($markup);
        if (is_object($markup)) {
            $markup = clone $markup;
            foreach ($markup as $name => $value) {
                if (is_string($value)) {
                    $markup->$name = Stack::valueSubstitutions($value);
                }
            }
        }
        $source .= Stack::valueSubstitutions($element->render($markup));
        return $source;
    }

    static public function renderElements($code, $share_frame = false)
    {
        $source = '';
        if (is_string($code)) {
            return Stack::valueSubstitutions($code);
        }
        if (!is_object($code)) {
            return $source;
        }
        foreach ($code as $name => $association) {
            /** @var Element $element */
            $element = self::classFactory($name);
            if (!$element) {
                continue;
            }
            $frame = new Stack($name, $association);
            Stack::push($frame);
            if (is_array($association)) {
                foreach ($association as $assoc) {
                    $source .= self::renderElement($element, $assoc);
                    if ($share_frame) {
                        Stack::shareFrame();
                    }
                }
            } else {
                $source .= self::renderElement($element, $association);
            }
            if ($share_frame) {
                Stack::shareFrame();
            }
            Stack::pop();
        }
        return $source;
    }

    static private function renderComment($text)
    {
        $indent = self::getIndent();
        return $indent . '<!-- ' . $text . ' -->' . "\n";
    }

    static private function renderComments($markup)
    {
        $result = '';
        if (!isset($markup->comment)) {
            return '';
        }
        if (is_array($markup->comment)) {
            foreach ($markup->comment as $comment) {
                $result .= self::renderComment($comment);
            }
        } else {
            $result = self::renderComment($markup->comment);
        }
        return $result;
    }

    static public function classFactory($name)
    {
        // initialize the singleton mapping of tags to classnames
        if (!count(self::$tagNameMap)) {
            foreach (self::ELEMENT_CLASS_ROOTS as $class_name) {
                self::$tagNameMap = array_merge(self::$tagNameMap, $class_name::getTagMapping());
            }
        }
        // if the tag instance has been created already, return that
        if (isset(self::$tagInstanceMap[$name])) {
            return self::$tagInstanceMap[$name];
        }
        // return the class name of the tag if possible
        if (isset(self::$tagNameMap[$name])) {
            $class_name = self::$tagNameMap[$name];
            if (!class_exists($class_name)) {
                return null;
            }
            self::$tagInstanceMap[$name] = new $class_name($name);
            return self::$tagInstanceMap[$name];
        }
        return null;
    }
}
