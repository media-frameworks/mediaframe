<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

abstract class Basic extends Element
{
    CONST BASE_CLASS_BASIC = 'Mediaframe\\Element\\Basic\\';

    CONST ELEMENT_BASIC_PAGE_CLASS = self::BASE_CLASS_BASIC . 'Page';
    CONST ELEMENT_BASIC_DOCTYPE_CLASS = self::BASE_CLASS_BASIC . 'Doctype';
    CONST ELEMENT_BASIC_HTML_CLASS = self::BASE_CLASS_BASIC . 'Html';
    CONST ELEMENT_BASIC_HEAD_CLASS = self::BASE_CLASS_BASIC . 'Head';
    CONST ELEMENT_BASIC_META_CLASS = self::BASE_CLASS_BASIC . 'Meta';
    CONST ELEMENT_BASIC_BASE_CLASS = self::BASE_CLASS_BASIC . 'Base';
    CONST ELEMENT_BASIC_TITLE_CLASS = self::BASE_CLASS_BASIC . 'Title';
    CONST ELEMENT_BASIC_BODY_CLASS = self::BASE_CLASS_BASIC . 'Body';
    CONST ELEMENT_BASIC_HEADING_CLASS = self::BASE_CLASS_BASIC . 'Heading';
    CONST ELEMENT_BASIC_PARAGRAPH_CLASS = self::BASE_CLASS_BASIC . 'Paragraph';
    CONST ELEMENT_BASIC_BREAK_CLASS = self::BASE_CLASS_BASIC . 'Break';
    CONST ELEMENT_BASIC_RULE_CLASS = self::BASE_CLASS_BASIC . 'Rule';
    CONST ELEMENT_BASIC_LINK_CLASS = self::BASE_CLASS_BASIC . 'Link';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'page'=>self::ELEMENT_BASIC_PAGE_CLASS,
            'doctype'=>self::ELEMENT_BASIC_DOCTYPE_CLASS,
            'html'=>self::ELEMENT_BASIC_HTML_CLASS,
            'head'=>self::ELEMENT_BASIC_HEAD_CLASS,
            'meta'=>self::ELEMENT_BASIC_META_CLASS,
            'base'=>self::ELEMENT_BASIC_BASE_CLASS,
            'title'=>self::ELEMENT_BASIC_TITLE_CLASS,
            'link'=>self::ELEMENT_BASIC_LINK_CLASS,
            'body'=>self::ELEMENT_BASIC_BODY_CLASS,
            'heading'=>self::ELEMENT_BASIC_HEADING_CLASS,
            'h1'=>self::ELEMENT_BASIC_HEADING_CLASS,
            'h2'=>self::ELEMENT_BASIC_HEADING_CLASS,
            'h3'=>self::ELEMENT_BASIC_HEADING_CLASS,
            'h4'=>self::ELEMENT_BASIC_HEADING_CLASS,
            'h5'=>self::ELEMENT_BASIC_HEADING_CLASS,
            'h6'=>self::ELEMENT_BASIC_HEADING_CLASS,
            'paragraph'=>self::ELEMENT_BASIC_PARAGRAPH_CLASS,
            'p'=>self::ELEMENT_BASIC_PARAGRAPH_CLASS,
            'break'=>self::ELEMENT_BASIC_BREAK_CLASS,
            'br'=>self::ELEMENT_BASIC_BREAK_CLASS,
            'rule'=>self::ELEMENT_BASIC_RULE_CLASS,
            'hr'=>self::ELEMENT_BASIC_RULE_CLASS,
        );
    }
}