<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Lists extends Element
{
    CONST BASE_CLASS_LISTS = '\\Mediaframe\\Element\\Lists\\';

    CONST ELEMENT_LIST_UL = self::BASE_CLASS_LISTS . 'UnorderedList';
    CONST ELEMENT_LIST_OL = self::BASE_CLASS_LISTS . 'OrderedList';
    CONST ELEMENT_LIST_LI = self::BASE_CLASS_LISTS . 'ListItem';
    CONST ELEMENT_LIST_DL = self::BASE_CLASS_LISTS . 'DescriptionList';
    CONST ELEMENT_LIST_DT = self::BASE_CLASS_LISTS . 'DescriptionTerm';
    CONST ELEMENT_LIST_DD = self::BASE_CLASS_LISTS . 'DescribedDescription';
    CONST ELEMENT_LIST_MENU = self::BASE_CLASS_LISTS . 'Menu';
    CONST ELEMENT_LIST_MENUITEM = self::BASE_CLASS_LISTS . 'Menuitem';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'ul' => self::ELEMENT_LIST_UL,
            'UnorderedList' => self::ELEMENT_LIST_UL,
            'ol' => self::ELEMENT_LIST_OL,
            'OrderedList' => self::ELEMENT_LIST_OL,
            'li' => self::ELEMENT_LIST_LI,
            'ListItem' => self::ELEMENT_LIST_LI,
            'dl' => self::ELEMENT_LIST_DL,
            'DescriptionList' => self::ELEMENT_LIST_DL,
            'dt' => self::ELEMENT_LIST_DT,
            'DescriptionTerm' => self::ELEMENT_LIST_DT,
            'dd' => self::ELEMENT_LIST_DD,
            'DescribedDescription' => self::ELEMENT_LIST_DD,
            'menu' => self::ELEMENT_LIST_MENU,
            'menuitem' => self::ELEMENT_LIST_MENUITEM,
        );
    }

    public function render($context)
    {
    }
}