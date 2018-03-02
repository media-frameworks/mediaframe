<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/23/2017
 * Time: 8:30 PM
 */

namespace Mediaframe;

class Stack
{
    public $name;
    public $data;
    public $script;
    public $constants = array();
    public $vars = array();
    public $classes = array();
    public $macros = array();
    public $services = array();
    public $dataset = array();

    static public $frames = array();
    static public $frame_index = -1;
    static public $offset_indent = 0;

    CONST SPACE_CHARS = '                                                                                                 ';

    public function __construct($name, $script = array())
    {
        $this->data = $script;
        $this->name = $name;
    }

    static public function getIndent($count = 0)
    {
        if ($count == 0) {
            $count = count(self::$frames) - 2;
        }
        return substr(self::SPACE_CHARS, 0, $count * 3);
    }

    static public function offsetIndent($amount)
    {
        self::$offset_indent += $amount;
    }

    static function valueSubstitutions($value)
    {
        if (!is_string($value)){
            return $value;
        }
        if (false === strpos($value, '$')) {
            return $value;
        }
        $found_one = true;
        while ($found_one) {
            $found_one = false;
            $parts = explode('$', ' ' . $value . ' ');
            if (count($parts) < 3) {
                return $value;
            }
            array_shift($parts);
            array_pop($parts);
            foreach ($parts as $part) {
                $name = strtolower($part);
                $lookup = '$' . $part . '$';
                if (isset(self::$frames[self::$frame_index]->constants[$name])) {
                    $constant_value = self::$frames[self::$frame_index]->constants[$name];
                    if ($lookup == $value && !is_string($constant_value)){
                        return $constant_value;
                    }
                    $found_one = true;
                    $value = str_replace($lookup, $constant_value, $value);
                    continue;
                }
                if (isset(self::$frames[self::$frame_index]->vars[$name])) {
                    $var_value = self::$frames[self::$frame_index]->vars[$name];
                    if ($lookup == $value && !is_string($var_value)){
                        return $var_value;
                    }
                    $found_one = true;
                    $value = str_replace($lookup, $var_value, $value);
                    continue;
                }
            }
        }
        return $value;
    }

    static public function setConstant($name, $value)
    {
        if (!is_string($value)) {
            $value = self::renderText($value);
        }
        self::$frames[self::$frame_index]->constants[strtolower($name)] = $value;
    }

    static public function setVar($name, $value)
    {
        $name = strtolower($name);
        for ($i = 0; $i < self::$frame_index; $i++) {
            if (isset(self::$frames[$i]->vars[$name])) {
                self::$frames[$i]->vars[$name] = $value;
            }
        }
        if (is_object($value) || is_array($value)) {
            foreach ($value as $n => $v) {
                self::$frames[self::$frame_index]->vars[$name . ':' . strtolower($n)] = $v;
            }
        } else {
            self::$frames[self::$frame_index]->vars[$name] = $value;
        }
    }

    static public function unsetVar($name)
    {
        unset(self::$frames[self::$frame_index]->vars[$name]);
    }

    static public function setClass($name, $value)
    {
        self::$frames[self::$frame_index]->classes[strtolower($name)] = $value;
    }

    static public function setMacro($name, $value)
    {
        self::$frames[self::$frame_index]->macros[strtolower($name)] = $value;
    }

    static public function setData($name, $value)
    {
        self::$frames[self::$frame_index]->dataset[strtolower($name)] = $value;
    }

    static public function getClass($name)
    {
        if (!isset(self::$frames[self::$frame_index]->classes[strtolower($name)])) {
            return null;
        }
        return self::$frames[self::$frame_index]->classes[strtolower($name)];
    }

    static public function getConstant($name)
    {
        if (!isset(self::$frames[self::$frame_index]->constants[strtolower($name)])) {
            return null;
        }
        return self::$frames[self::$frame_index]->constants[strtolower($name)];
    }

    static public function getVar($name)
    {
        if (!isset(self::$frames[self::$frame_index]->vars[strtolower($name)])) {
            return null;
        }
        return self::$frames[self::$frame_index]->vars[strtolower($name)];
    }

    static public function getMacro($name)
    {
        if (!isset(self::$frames[self::$frame_index]->macros[strtolower($name)])) {
            return null;
        }
        return self::$frames[self::$frame_index]->macros[strtolower($name)];
    }

    static public function getData($name)
    {
        if (!isset(self::$frames[self::$frame_index]->dataset[strtolower($name)])) {
            return null;
        }
        return self::$frames[self::$frame_index]->dataset[strtolower($name)];
    }

    static public function shareFrame()
    {
        $constants = self::$frames[self::$frame_index]->constants;
        $vars = self::$frames[self::$frame_index]->vars;
        $classes = self::$frames[self::$frame_index]->classes;
        $macros = self::$frames[self::$frame_index]->macros;
        $services = self::$frames[self::$frame_index]->services;
        $dataset = self::$frames[self::$frame_index]->dataset;
        self::$frames[self::$frame_index - 1]->constants = array_merge(self::$frames[self::$frame_index - 1]->constants, $constants);
        self::$frames[self::$frame_index - 1]->vars = array_merge(self::$frames[self::$frame_index - 1]->vars, $vars);
        self::$frames[self::$frame_index - 1]->classes = array_merge(self::$frames[self::$frame_index - 1]->classes, $classes);
        self::$frames[self::$frame_index - 1]->macros = array_merge(self::$frames[self::$frame_index - 1]->macros, $macros);
        self::$frames[self::$frame_index - 1]->services = array_merge(self::$frames[self::$frame_index - 1]->services, $services);
        self::$frames[self::$frame_index - 1]->dataset = array_merge(self::$frames[self::$frame_index - 1]->dataset, $dataset);
    }

    static function htmlElement($token)
    {
        $known_elements = array(
            'a' => true,
            'div' => true,
            'span' => true,
            'table' => true,
            'body' => true
        );
        return isset($known_elements[$token]);
    }

    static function renderClasses()
    {
        $indent = self::getIndent();
        $single_indent = self::getIndent(1);
        $markup = $indent . $single_indent . '<style type="text/css">' . "\n";
        $classes = self::$frames[self::$frame_index]->classes;
        foreach ($classes as $name => $class) {
            $dot = '.';
            if (false != strpos($name, '::')) {
                list($element, $qualifier) = explode('::', $name);
                if ('' == $qualifier) {
                    $name = $element;
                }
                if (self::htmlElement($element)) {
                    $dot = '';
                }
            } else {
                if (false !== strpos($name, ':')) {
                    list($element, $qualifier) = explode(':', $name);
                    if ('' == $qualifier) {
                        $name = $element;
                    }
                    if (self::htmlElement($element)) {
                        $dot = '';
                    }
                }
            }
            $markup .= $indent . $single_indent . $single_indent . $dot . $name . ' {';
            foreach ($class as $attr_name => $attr_value) {
                $markup .= ' ' . $attr_name . ': ' . $attr_value . ';';
            }
            $markup .= '}' . "\n";
        }
        $markup .= $indent . $single_indent . '</style>' . "\n";
        return $markup;
    }

    static function renderText($markup)
    {
        if (is_string($markup)) {
            return $markup;
        }
        return Element::renderElements($markup);
    }

    static function push($frame)
    {
        if (self::$frame_index >= 0) {
            $frame->constants = array_merge($frame->constants, self::$frames[self::$frame_index]->constants);
            $frame->vars = array_merge($frame->vars, self::$frames[self::$frame_index]->vars);
            $frame->classes = array_merge($frame->classes, self::$frames[self::$frame_index]->classes);
            $frame->macros = array_merge($frame->macros, self::$frames[self::$frame_index]->macros);
            $frame->services = array_merge($frame->services, self::$frames[self::$frame_index]->services);
            $frame->dataset = array_merge($frame->dataset, self::$frames[self::$frame_index]->dataset);
        }
        array_push(self::$frames, $frame);
        self::$frame_index++;
    }

    static function pop()
    {
        self::$frame_index--;
        $frame = array_pop(self::$frames);
        return $frame;
    }
}
