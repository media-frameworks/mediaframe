<?php

namespace Mediaframe\Element\Events;

use Mediaframe\Element\Event;
use Mediaframe\Stack;

class Events extends Event
{
    private $event = null;

    public function __construct($event)
    {
        $this->event = $event;
        parent::__construct($event);
    }

    private function renderScript($script)
    {
        $scripted = Stack::valueSubstitutions($script);
        return ' ' . $this->event . '="' . $scripted . '"';
    }

    public function render($markup)
    {
        $result = '';
        if (is_string($markup)){
            $result = $this->renderScript($markup);
            echo ($result);
        }
        else if (!isset($markup->script)) {
            $result = 'script not set';
        } else {
            $result = $this->renderScript($markup->script);
        }
        return $result;
    }
}

class OnClick extends Events
{
    public function __construct()
    {
        parent::__construct('onclick');
    }

    public function render($markup)
    {
        parent::render($markup);

    }

}