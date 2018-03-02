<?php

namespace Mediaframe\Element\Code;

use Mediaframe\Element\Code;
use Mediaframe\Stack;

class ForLoop extends Code
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        $content = '';

        if (isset($markup->var)) {
            foreach ($markup->var as $name => $value) {
                Stack::setVar($name, $value);
            }
        }
        if (!isset ($markup->test)) {
            echo("test is not set in for loop\n");
            var_dump($markup);
            return $content;
        }
        if (!isset ($markup->index)) {
            echo("index is not set in for loop\n");
            return $content;
        }
        if (!isset ($markup->markup)) {
            echo("markup is not set in for loop\n");
            return $content;
        }
        $update = $markup->update ? $markup->update : null;

        $indent = self::getIndent();
        while (true) {
            $expression = Stack::valueSubstitutions($markup->test);
            $full_expression = 'return(' . $expression . ')?1:null;';
            if (!eval($full_expression)) {
                break;
            }
            if (is_string($markup->markup)) {
                $content .= "\n" . $indent . Stack::valueSubstitutions($markup->markup);
            } else {
                $content .= parent::renderElements($markup->markup);
            }
            if ($update) {
                $expression = Stack::valueSubstitutions($update);
                Stack::setVar($markup->index, eval('return ' . $expression . ';'));
            }
        }

        return $content;
    }
}