<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Semantic extends Element
{
    CONST BASE_CLASS_SEMANTIC = '\\Mediaframe\\Element\\Semantic\\';

    CONST ELEMENT_SEMANTIC_DIV_CLASS = self::BASE_CLASS_SEMANTIC . 'Div';
    CONST ELEMENT_SEMANTIC_SPAN_CLASS = self::BASE_CLASS_SEMANTIC . 'Span';
    CONST ELEMENT_SEMANTIC_HEADER_CLASS = self::BASE_CLASS_SEMANTIC . 'Header';
    CONST ELEMENT_SEMANTIC_FOOTER_CLASS = self::BASE_CLASS_SEMANTIC . 'Footer';
    CONST ELEMENT_SEMANTIC_MAIN_CLASS = self::BASE_CLASS_SEMANTIC . 'Main';
    CONST ELEMENT_SEMANTIC_SECTION_CLASS = self::BASE_CLASS_SEMANTIC . 'Section';
    CONST ELEMENT_SEMANTIC_ARTICLE_CLASS = self::BASE_CLASS_SEMANTIC . 'Article';
    CONST ELEMENT_SEMANTIC_ASIDE_CLASS = self::BASE_CLASS_SEMANTIC . 'Aside';
    CONST ELEMENT_SEMANTIC_DETAILS_CLASS = self::BASE_CLASS_SEMANTIC . 'Details';
    CONST ELEMENT_SEMANTIC_DIALOG_CLASS = self::BASE_CLASS_SEMANTIC . 'Dialog';
    CONST ELEMENT_SEMANTIC_SUMMARY_CLASS = self::BASE_CLASS_SEMANTIC . 'Summary';
    CONST ELEMENT_SEMANTIC_LOCATION_CLASS = self::BASE_CLASS_SEMANTIC . 'Location';
    CONST ELEMENT_SEMANTIC_IFRAME_CLASS = self::BASE_CLASS_SEMANTIC . 'IFrame';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'div' => self::ELEMENT_SEMANTIC_DIV_CLASS,
            'span' => self::ELEMENT_SEMANTIC_SPAN_CLASS,
            'header' => self::ELEMENT_SEMANTIC_HEADER_CLASS,
            'footer' => self::ELEMENT_SEMANTIC_FOOTER_CLASS,
            'main' => self::ELEMENT_SEMANTIC_MAIN_CLASS,
            'section' => self::ELEMENT_SEMANTIC_SECTION_CLASS,
            'article' => self::ELEMENT_SEMANTIC_ARTICLE_CLASS,
            'aside' => self::ELEMENT_SEMANTIC_ASIDE_CLASS,
            'details' => self::ELEMENT_SEMANTIC_DETAILS_CLASS,
            'dialog' => self::ELEMENT_SEMANTIC_DIALOG_CLASS,
            'summary' => self::ELEMENT_SEMANTIC_SUMMARY_CLASS,
            'location' => self::ELEMENT_SEMANTIC_LOCATION_CLASS,
            'iframe' => self::ELEMENT_SEMANTIC_IFRAME_CLASS,
        );
    }

    public function render($context)
    {
    }
}