<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Multimedia extends Element
{
    CONST BASE_CLASS_MULTIMEDIA = '\\Mediaframe\\Element\\Multimedia\\';

    CONST ELEMENT_MULTIMEDIA_AUDIO_CLASS = self::BASE_CLASS_MULTIMEDIA . 'Audio';
    CONST ELEMENT_MULTIMEDIA_SOURCE_CLASS = self::BASE_CLASS_MULTIMEDIA . 'Source';
    CONST ELEMENT_MULTIMEDIA_TRACK_CLASS = self::BASE_CLASS_MULTIMEDIA . 'Track';
    CONST ELEMENT_MULTIMEDIA_VIDEO_CLASS = self::BASE_CLASS_MULTIMEDIA . 'Video';
    CONST ELEMENT_MULTIMEDIA_SVG_CLASS = self::BASE_CLASS_MULTIMEDIA . 'Svg';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'audio' => self::ELEMENT_MULTIMEDIA_AUDIO_CLASS,
            'source' => self::ELEMENT_MULTIMEDIA_SOURCE_CLASS,
            'track' => self::ELEMENT_MULTIMEDIA_TRACK_CLASS,
            'video' => self::ELEMENT_MULTIMEDIA_VIDEO_CLASS,
            'svg' => self::ELEMENT_MULTIMEDIA_SVG_CLASS
        );
    }

    public function render($context)
    {
    }
}