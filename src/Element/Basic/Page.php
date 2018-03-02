<?php

namespace Mediaframe\Element\Basic;

use Mediaframe\Element\Basic;

class Page extends Basic
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($script)
    {
        $elements = parent::renderElements($script);
        $result = '<html>' . "\n";
        $result .= '<head>' . "\n";
        $result .= $elements . "\n";
        $result .= '</head>' . "\n";
        $result .= '<body>' . "\n";
        $result .= '</body>' . "\n";
        $result .= '</html>' . "\n";
        return $result;
    }

}
