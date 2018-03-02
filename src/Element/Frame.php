<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Frame extends Element
{
    CONST BASE_CLASS_FRAME = '\\Mediaframe\\Element\\Frame\\';

    CONST ELEMENT_FRAME_IFRAME_CLASS = self::BASE_CLASS_FRAME . 'IFrame';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'iframe' => self::ELEMENT_FRAME_IFRAME_CLASS,
        );
    }

    public function render($context)
    {
    }
}