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

    public function addGlobals(&$frame)
    {
        $filesystem_root = $_SERVER['SCRIPT_FILENAME'];
        $last_slash = strrpos($filesystem_root, '/');
        $frame->constants['global::filesystem_root'] = substr($filesystem_root, 0, $last_slash);
        $frame->constants['global::web_root'] = '/var/www/html';
        $frame->constants['global::app_root'] = $frame->constants['global::web_root'] . '/app/' . $this->app_name;

        $script_name = $_SERVER['SCRIPT_NAME'];
        $last_slash = strrpos($script_name, '/index.php');
        $frame->constants['global::mediaframe_root'] = substr($script_name, 0, $last_slash);

        $server_name = $_SERVER['SERVER_NAME'];
        $frame->constants['global::server_name'] = $_SERVER['REQUEST_SCHEME'] . '://' . $server_name;

        $frame->constants['global::request_method'] = $_SERVER['REQUEST_METHOD'];
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
        if (!file_exists($this->script_path)) {
            return "\n" . 'error, script "' . $this->script_path . '" is missing';
        }
        $code = json_decode(file_get_contents($this->script_path));
        if (false === $code) {
            return false;
        }
        $frame = new Stack("first", '{}');
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
                    $this->array_notation($frame, $array_name, $v);
                }
            }
        }
        foreach ($_POST as $name => $value) {
            $frame->constants['post::' . urldecode($name)] = urldecode($value);
            $frame->constants[urldecode($name)] = urldecode($value);
        }
        $this->addGlobals($frame);
        Stack::push($frame);
        return Element::renderElements($code);
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