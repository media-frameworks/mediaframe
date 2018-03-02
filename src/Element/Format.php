<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Format extends Element
{
    CONST BASE_CLASS_FORMAT = '\\Mediaframe\\Element\\Format\\';

    CONST ELEMENT_FORMAT_ABBR_CLASS = self::BASE_CLASS_FORMAT . 'Abbreviation';
    CONST ELEMENT_FORMAT_ADDRESS_CLASS = self::BASE_CLASS_FORMAT . 'Address';
    CONST ELEMENT_FORMAT_BOLD_CLASS = self::BASE_CLASS_FORMAT . 'Bold';
    CONST ELEMENT_FORMAT_DIRECTION_CLASS = self::BASE_CLASS_FORMAT . 'Direction';
    CONST ELEMENT_FORMAT_OPPOSITE_CLASS = self::BASE_CLASS_FORMAT . 'Opposite';
    CONST ELEMENT_FORMAT_BLOCKQUOTE_CLASS = self::BASE_CLASS_FORMAT . 'Blockquote';
    CONST ELEMENT_FORMAT_CITE_CLASS = self::BASE_CLASS_FORMAT . 'Cite';
    CONST ELEMENT_FORMAT_CODE_CLASS = self::BASE_CLASS_FORMAT . 'Code';
    CONST ELEMENT_FORMAT_DELETED_CLASS = self::BASE_CLASS_FORMAT . 'Deleted';
    CONST ELEMENT_FORMAT_DEFINE_CLASS = self::BASE_CLASS_FORMAT . 'Define';
    CONST ELEMENT_FORMAT_EMPHASIS_CLASS = self::BASE_CLASS_FORMAT . 'Emphasis';
    CONST ELEMENT_FORMAT_ITALIC_CLASS = self::BASE_CLASS_FORMAT . 'Italic';
    CONST ELEMENT_FORMAT_INSERTED_CLASS = self::BASE_CLASS_FORMAT . 'Inserted';
    CONST ELEMENT_FORMAT_KEYBOARD_CLASS = self::BASE_CLASS_FORMAT . 'Keyboard';
    CONST ELEMENT_FORMAT_MARK_CLASS = self::BASE_CLASS_FORMAT . 'Mark';
    CONST ELEMENT_FORMAT_METER_CLASS = self::BASE_CLASS_FORMAT . 'Meter';
    CONST ELEMENT_FORMAT_PREFORMATTED_CLASS = self::BASE_CLASS_FORMAT . 'Preformatted';
    CONST ELEMENT_FORMAT_PROGRESS_CLASS = self::BASE_CLASS_FORMAT . 'Progress';
    CONST ELEMENT_FORMAT_QUOTED_CLASS = self::BASE_CLASS_FORMAT . 'Quoted';
    CONST ELEMENT_FORMAT_NORUBY_CLASS = self::BASE_CLASS_FORMAT . 'NoRuby';
    CONST ELEMENT_FORMAT_PRONOUNCE_CLASS = self::BASE_CLASS_FORMAT . 'Pronounce';
    CONST ELEMENT_FORMAT_RUBY_CLASS = self::BASE_CLASS_FORMAT . 'Ruby';
    CONST ELEMENT_FORMAT_STRIKEOUT_CLASS = self::BASE_CLASS_FORMAT . 'Strikeout';
    CONST ELEMENT_FORMAT_SAMPLE_CLASS = self::BASE_CLASS_FORMAT . 'Sample';
    CONST ELEMENT_FORMAT_SMALL_CLASS = self::BASE_CLASS_FORMAT . 'Small';
    CONST ELEMENT_FORMAT_STRONG_CLASS = self::BASE_CLASS_FORMAT . 'Strong';
    CONST ELEMENT_FORMAT_SUBSCRIPT_CLASS = self::BASE_CLASS_FORMAT . 'SubScript';
    CONST ELEMENT_FORMAT_SUPERSCRIPT_CLASS = self::BASE_CLASS_FORMAT . 'SuperScript';
    CONST ELEMENT_FORMAT_TIME_CLASS = self::BASE_CLASS_FORMAT . 'Time';
    CONST ELEMENT_FORMAT_UNDERLINE_CLASS = self::BASE_CLASS_FORMAT . 'Underline';
    CONST ELEMENT_FORMAT_VARIABLE_CLASS = self::BASE_CLASS_FORMAT . 'Variable';
    CONST ELEMENT_FORMAT_WORDBREAK_CLASS = self::BASE_CLASS_FORMAT . 'Wordbreak';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'abbr' => self::ELEMENT_FORMAT_ABBR_CLASS,
            'abbreviation' => self::ELEMENT_FORMAT_ABBR_CLASS,
            'address' => self::ELEMENT_FORMAT_ADDRESS_CLASS,
            'bold' => self::ELEMENT_FORMAT_BOLD_CLASS,
            'b' => self::ELEMENT_FORMAT_BOLD_CLASS,
            'direction' => self::ELEMENT_FORMAT_DIRECTION_CLASS,
            'bdi' => self::ELEMENT_FORMAT_DIRECTION_CLASS,
            'opposite' => self::ELEMENT_FORMAT_OPPOSITE_CLASS,
            'bdo' => self::ELEMENT_FORMAT_OPPOSITE_CLASS,
            'blockquote' => self::ELEMENT_FORMAT_BLOCKQUOTE_CLASS,
            'cite' => self::ELEMENT_FORMAT_CITE_CLASS,
            'code' => self::ELEMENT_FORMAT_CODE_CLASS,
            'deleted' => self::ELEMENT_FORMAT_DELETED_CLASS,
            'del' => self::ELEMENT_FORMAT_DELETED_CLASS,
            'define' => self::ELEMENT_FORMAT_DEFINE_CLASS,
            'dfn' => self::ELEMENT_FORMAT_DEFINE_CLASS,
            'emphasis' => self::ELEMENT_FORMAT_EMPHASIS_CLASS,
            'em' => self::ELEMENT_FORMAT_EMPHASIS_CLASS,
            'italic' => self::ELEMENT_FORMAT_ITALIC_CLASS,
            'i' => self::ELEMENT_FORMAT_ITALIC_CLASS,
            'inserted' => self::ELEMENT_FORMAT_INSERTED_CLASS,
            'ins' => self::ELEMENT_FORMAT_INSERTED_CLASS,
            'keyboard' => self::ELEMENT_FORMAT_KEYBOARD_CLASS,
            'kbd' => self::ELEMENT_FORMAT_KEYBOARD_CLASS,
            'mark' => self::ELEMENT_FORMAT_MARK_CLASS,
            'meter' => self::ELEMENT_FORMAT_METER_CLASS,
            'pre' => self::ELEMENT_FORMAT_PREFORMATTED_CLASS,
            'preformatted' => self::ELEMENT_FORMAT_PREFORMATTED_CLASS,
            'progress' => self::ELEMENT_FORMAT_PROGRESS_CLASS,
            'quoted' => self::ELEMENT_FORMAT_QUOTED_CLASS,
            'q' => self::ELEMENT_FORMAT_QUOTED_CLASS,
            'noruby' => self::ELEMENT_FORMAT_NORUBY_CLASS,
            'rp' => self::ELEMENT_FORMAT_NORUBY_CLASS,
            'pronounce' => self::ELEMENT_FORMAT_PRONOUNCE_CLASS,
            'rt' => self::ELEMENT_FORMAT_PRONOUNCE_CLASS,
            'ruby' => self::ELEMENT_FORMAT_RUBY_CLASS,
            'strikeout' => self::ELEMENT_FORMAT_STRIKEOUT_CLASS,
            's' => self::ELEMENT_FORMAT_STRIKEOUT_CLASS,
            'sample' => self::ELEMENT_FORMAT_SAMPLE_CLASS,
            'samp' => self::ELEMENT_FORMAT_SAMPLE_CLASS,
            'small' => self::ELEMENT_FORMAT_SMALL_CLASS,
            'strong' => self::ELEMENT_FORMAT_STRONG_CLASS,
            'sub' => self::ELEMENT_FORMAT_SUBSCRIPT_CLASS,
            'subscript' => self::ELEMENT_FORMAT_SUBSCRIPT_CLASS,
            'super' => self::ELEMENT_FORMAT_SUPERSCRIPT_CLASS,
            'superscript' => self::ELEMENT_FORMAT_SUPERSCRIPT_CLASS,
            'time' => self::ELEMENT_FORMAT_TIME_CLASS,
            'underline' => self::ELEMENT_FORMAT_UNDERLINE_CLASS,
            'u' => self::ELEMENT_FORMAT_UNDERLINE_CLASS,
            'var' => self::ELEMENT_FORMAT_VARIABLE_CLASS,
            'variable' => self::ELEMENT_FORMAT_VARIABLE_CLASS,
            'wordbreak'=>self::ELEMENT_FORMAT_WORDBREAK_CLASS
        );
    }

    public function render($context)
    {
    }
}