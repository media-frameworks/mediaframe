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
        if (!file_exists($script)) {
            if (substr($script, 0, 2) == '~/') {
                $base_dir = '/var/www/html/script';
                $request_params['script'] = substr($script, 2);
                $script = $request_params['script'];
            }
            if (substr($script, 0, 2) == '!/') {
                $base_dir = '';
                $request_params['script'] = substr($script, 1);
                $script = $request_params['script'];
            }
            $full_path = $base_dir . '/' . $script;
        } else {
            $full_path = $script;
        }
        if (!file_exists($full_path)) {
            return '';
        } else {
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
            $rendered = Element::renderElements($code, true);
            if ($strip_newlines) {
                $rendered = $this->strip_newlines($rendered);
            }
            Stack::shareFrame();
            return $rendered;
        }
    }
}
