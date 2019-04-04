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

    private function invokeImplodeService($markup)
    {
        if (!isset($markup->delimiter) || !isset($markup->pieces) || !is_array($markup->pieces)) {
            return '';
        }
        return implode($markup->delimiter, $markup->pieces);
    }

    private function invokeMailService($markup)
    {
        if (!isset($markup->to) || !isset($markup->subject) || !isset($markup->message) || !isset($markup->headers)) {
            return '';
        }
        if (is_object($markup->message)) {
            $markup->message = Element::renderElements($markup->message);
        }
        mail($markup->to, $markup->subject, $markup->message, $markup->headers);
        return '';
    }

    private function invokeService($markup)
    {
        switch ($markup->service) {
            case self::INVOKE_MAIL_SERVICE:
                return $this->invokeMailservice($markup);
            case self::INVOKE_IMPLODE_SERVICE:
                return $this->invokeImplodeService($markup);

            default:
                return '';
        }
    }

    private function invokeMacro($macro_name, $markup = null)
    {
        $macro = Stack::getMacro($macro_name);
        if (!$macro) {
            return $macro_name . ' not found';
        }
        if ($markup != null) {
            if (isset($markup->var)) {
                foreach ($markup->var as $name => $value) {
                    if (isset($macro->var)){
                        unset($macro->var->$name);
                    }
                    $value = Stack::valueSubstitutions($value);
                    Stack::setVar($name, Element::renderElements($value));
                }
            }
        }
        Stack::shareFrame();
        return Element::renderElements($macro);
    }

    public function render($markup)
    {
        if (is_string($markup)) {
            return $this->invokeMacro($markup);
        }
        if (isset($markup->service)) {
            return $this->invokeService($markup);
        }
        if (!isset($markup->name)) {
            return 'macro name not set';
        }
        Stack::offsetIndent(1);
        $result = $this->invokeMacro($markup->name, $markup);
        Stack::offsetIndent(-1);
        return $result;
    }
}
