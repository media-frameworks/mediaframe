<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Tables extends Element
{
    CONST BASE_CLASS_TABLE = '\\Mediaframe\\Element\\Tables\\';

    CONST ELEMENT_TABLE_TABLE = self::BASE_CLASS_TABLE . 'Table';
    CONST ELEMENT_TABLE_CAPTION = self::BASE_CLASS_TABLE . 'Caption';
    CONST ELEMENT_TABLE_TH = self::BASE_CLASS_TABLE . 'TableHeader';
    CONST ELEMENT_TABLE_TR = self::BASE_CLASS_TABLE . 'TableRow';
    CONST ELEMENT_TABLE_TD = self::BASE_CLASS_TABLE . 'TableColumn';
    CONST ELEMENT_TABLE_THEAD = self::BASE_CLASS_TABLE . 'TableHead';
    CONST ELEMENT_TABLE_TBODY = self::BASE_CLASS_TABLE . 'TableBody';
    CONST ELEMENT_TABLE_TFOOT = self::BASE_CLASS_TABLE . 'TableFooter';
    CONST ELEMENT_TABLE_COL = self::BASE_CLASS_TABLE . 'Col';
    CONST ELEMENT_TABLE_COLGROUP = self::BASE_CLASS_TABLE . 'Colgroup';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'table' => self::ELEMENT_TABLE_TABLE,
            'caption' => self::ELEMENT_TABLE_CAPTION,
            'th' => self::ELEMENT_TABLE_TH,
            'header' => self::ELEMENT_TABLE_TH,
            'tr' => self::ELEMENT_TABLE_TR,
            'row' => self::ELEMENT_TABLE_TR,
            'td' => self::ELEMENT_TABLE_TD,
            'column' => self::ELEMENT_TABLE_TD,
            'thead' => self::ELEMENT_TABLE_THEAD,
            'tbody' => self::ELEMENT_TABLE_TBODY,
            'tfoot' => self::ELEMENT_TABLE_TFOOT,
            'col' => self::ELEMENT_TABLE_COL,
            'colgroup' => self::ELEMENT_TABLE_COLGROUP
        );
    }

    public function render($context)
    {
    }
}