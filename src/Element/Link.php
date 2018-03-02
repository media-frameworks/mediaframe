<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Link extends Element
{
    CONST BASE_CLASS_LINK = '\\Mediaframe\\Element\\Link\\';

    CONST ELEMENT_LINK_ANCHOR = self::BASE_CLASS_LINK . 'Anchor';
    CONST ELEMENT_LINK_NAV = self::BASE_CLASS_LINK . 'Nav';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'a' => self::ELEMENT_LINK_ANCHOR,
            'anchor' => self::ELEMENT_LINK_ANCHOR,
            'nav' => self::ELEMENT_LINK_NAV,
        );
    }

    public function render($context)
    {
    }
}