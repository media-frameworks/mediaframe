<?php

namespace Mediaframe\Element\Forms;

use Mediaframe\Element\Forms;
use Mediaframe\Element;

class Action extends Forms
{
    CONST SUPPORTED_ATTRS = array();

    static private $supportedAttrs = null;

    static public function initAttrs()
    {
        self::$supportedAttrs = array();
    }

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public function render($markup)
    {
        return parent::renderElements($markup);
    }
}

Input::initAttrs();
