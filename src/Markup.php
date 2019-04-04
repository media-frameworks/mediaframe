<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/23/2017
 * Time: 7:21 PM
 */

namespace Mediaframe;

class Markup
{
    private $script_path;
    private $request_params;
    private $app_name;

    public function __construct($script_path, $request_params = array(), $app_name = '<noappname>')
    {
        $this->script_path = $script_path;
        $this->request_params = $request_params;
        $this->app_name = $app_name;
    }

    private function array_notation($frame, $base_name, $value)
    {
        if (is_array($value) || is_object($value)) {
            foreach ($value as $name => $val) {
                if (is_array($value)) {
                    $this->array_notation($frame, $base_name . '[' . $name . ']', $val);
                } else {
                    $this->array_notation($frame, $base_name . '->' . $name, $val);
                }
            }
        }
        $base_name = strtolower($base_name);
        $frame->constants[$base_name] = $value;
    }

    public function render()
    {
        $start_time = microtime(true);
        if (!file_exists($this->script_path)) {
            return "\n" . 'error, script "' . $this->script_path . '" is missing';
        }
        $code = json_decode(file_get_contents($this->script_path));
        if (false === $code) {
            return false;
        }
        $frame = new Stack("first", '{}');
        Stack::setConstant('local::script_dir', dirname($this->script_path));
        foreach ($this->request_params as $name => $value) {
            $name = urldecode($name);
            if (!is_array($value) && !is_object($value)) {
                $value = urldecode($value);
                $frame->constants[$name] = $value;
            } else {
                foreach ($value as $n => $v) {
                    if (is_array($value)) {
                        $array_name = $name . '[' . $n . ']';
                    } else {
                        $array_name = $name . '->' . $n;
                    }
                    $frame->constants[$name] = $value;
                    $this->array_notation($frame, $array_name, $v);
                }
            }
        }
        foreach ($_POST as $name => $value) {
            $frame->constants['post::' . urldecode($name)] = urldecode($value);
            $frame->constants[urldecode($name)] = urldecode($value);
        }
        Stack::push($frame);
        $markup = Element::renderElements($code);
        Stack::pop();
        $end_time = microtime(true);
        $total_time = $end_time - $start_time;
        return $markup . "\n" . '<!-- markup by mediaframe in ' . $total_time . 's. -->';
    }

}

spl_autoload_register(function ($classname) {
    $filename = str_replace('Mediaframe\\', __DIR__ . "/", $classname) . '.php';
    $filename = str_replace('\\', '/', $filename);
    if (!file_exists($filename)) {
        return;
    }
    require_once($filename);
});