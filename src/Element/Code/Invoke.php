<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;
use Mediaframe\Element;

class Invoke extends Code
{
    CONST INVOKE_MAIL_SERVICE = "mail";
    CONST INVOKE_IMPLODE_SERVICE = "implode";

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render_indent()
    {
        return false;
    }

    private function set_macro_var(&$macro, $name, $value, &$original_vars)
    {
        $current_value = Stack::getVar($name);
        if ($current_value) {
            $original_vars[$name] = Stack::getVar($name);
        }
        if (isset($macro->var)) {
            unset($macro->var->$name);
        }
        $value = Stack::valueSubstitutions($value);
        Stack::setVar($name, Element::renderElements($value));
    }

    private function invokeMacro($macro_name, $markup = null)
    {
        $macro = Stack::getMacro($macro_name);
        if (!$macro) {
            return $macro_name . ' not found';
        }
        $original_vars = array();
        if ($markup != null) {
            if (isset($markup->var)) {
                foreach ($markup->var as $name => $value) {
                    $this->set_macro_var($macro, $name, $value, $original_vars);
                }
            } else {
                foreach ($markup as $var_name => $var_value) {
                    $this->set_macro_var($macro, $var_name, $var_value, $original_vars);
                }
            }
        }
        Stack::shareFrame();
        $result = Element::renderElements($macro);
        foreach($original_vars as $var_name => $var_value){
            Stack::setVar($var_name,$var_value);
        }
        return $result;
    }

    public function render($markup)
    {
        if (is_string($markup)) {
            return $this->invokeMacro($markup);
        }
        if (is_object($markup)) {
            if (isset($markup->name)) {
                return $this->invokeMacro($markup->name, $markup);
            }
            $results = array();
            foreach ($markup as $macro_name => $macro_markup) {
                $results[] = $this->invokeMacro($macro_name, $macro_markup);
            }
            if (count($results)) {
                return implode("\n", $results);
            }
        }
        return 'nothing to invoke';
    }
}
