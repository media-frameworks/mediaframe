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

    public function render($markup)
    {
        $app_root = Stack::getConstant('global::app_root');
        $script = $markup;
        if (is_object($markup)) {
            $script = $markup->script;
        }
        $base_dir = $app_root;
        $script = Stack::valueSubstitutions($script);
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
        if (!file_exists($full_path)) {
            return 'cannot render file: ' . $full_path;
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
            Stack::shareFrame();
            return $rendered;
        }
    }
}
