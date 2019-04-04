<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Element;
use Mediaframe\Stack;

class Import extends Code
{
    CONST SUPPORTED_ATTRS = array();

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    private function strip_newlines($text)
    {
        $all_lines = explode("\n", $text);
        $result = '';
        foreach ($all_lines as $line) {
            $result .= trim($line);
        }
        return $result;
    }

    public function render($markup)
    {
        $app_root = Stack::getConstant('global::app_root');
        $script = $markup;
        $strip_newlines = false;
        if (is_object($markup)) {
            if (isset($markup->script)) {
                $script = $markup->script;
                if (isset($markup->strip_newlines)) {
                    $strip_newlines = $markup->strip_newlines;
                }
            } else {
                $script = Element::renderElements($markup);
            }
        }
        $base_dir = $app_root;
        $script = Stack::valueSubstitutions($script);
        if (file_exists($script)) {
            $full_path = $script;
        } else {
            $in_script_dir = Stack::getConstant('local::script_dir') . '/' . $script;
            if (file_exists($in_script_dir)) {
                $full_path = $in_script_dir;
            } else {
                if (substr($script, 0, 2) == '!/') {
                    $base_dir = '';
                    $request_params['script'] = substr($script, 1);
                    $script = $request_params['script'];
                }
                $full_path = $base_dir . '/' . $script;
            }
        }
        if (!file_exists($full_path)) {
            return '';
        }
        $code = json_decode(file_get_contents($full_path));
        if (isset($markup->params)) {
            foreach ($markup->params as $name => $value) {
                if (isset($code->const)) {
                    if (isset($code->const->$name)) {
                        $code->const->$name = $value;
                    }
                }
                if (isset($code->var)) {
                    if (isset($code->var->$name)) {
                        $code->var->$name = $value;
                    }
                }
            }
        }

        // set the new script dir and then restore it
        $script_dir = Stack::getConstant('local::script_dir');
        Stack::setConstant('local::script_dir', dirname($full_path));
        $rendered = Element::renderElements($code, true);
        Stack::setConstant('local::script_dir', $script_dir;

        if ($strip_newlines) {
            $rendered = $this->strip_newlines($rendered);
        }
        Stack::shareFrame();
        return $rendered;
    }
}
