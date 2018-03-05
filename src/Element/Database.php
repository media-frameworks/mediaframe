<?php

namespace Mediaframe\Element;

use Mediaframe\Element;

class Database extends Element
{
    CONST BASE_CLASS_DATA = '\\Mediaframe\\Element\\Database\\';

    CONST ELEMENT_DATA_QUERY = self::BASE_CLASS_DATA . 'Query';
    CONST ELEMENT_DATA_INSERT = self::BASE_CLASS_DATA . 'Insert';
    CONST ELEMENT_DATA_UPDATE = self::BASE_CLASS_DATA . 'Update';
    CONST ELEMENT_DATA_DELETE = self::BASE_CLASS_DATA . 'Delete';
    CONST ELEMENT_DATA_ALTER = self::BASE_CLASS_DATA . 'Alter';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'query' => self::ELEMENT_DATA_QUERY,
            'insert' => self::ELEMENT_DATA_INSERT,
            'update' => self::ELEMENT_DATA_UPDATE,
            'delete' => self::ELEMENT_DATA_DELETE,
            'alter' => self::ELEMENT_DATA_ALTER,
        );
    }

    public function render($context)
    {
    }
}