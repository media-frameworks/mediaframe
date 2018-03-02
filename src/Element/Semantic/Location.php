<?php

namespace Mediaframe\Element\Semantic;

use Mediaframe\Element\Semantic;
use Mediaframe\Stack;

class Location extends Semantic
{
    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        if (!is_string($markup)) {
            return '';
        }
        header("Location: " . $markup);
        exit;
    }
}

