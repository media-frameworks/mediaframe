<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Image extends Element
{
    CONST BASE_CLASS_IMAGE = '\\Mediaframe\\Element\\Image\\';

    CONST ELEMENT_IMAGE_IMG_CLASS = self::BASE_CLASS_IMAGE . 'Img';
    CONST ELEMENT_IMAGE_MAP_CLASS = self::BASE_CLASS_IMAGE . 'Map';
    CONST ELEMENT_IMAGE_AREA_CLASS = self::BASE_CLASS_IMAGE . 'Area';
    CONST ELEMENT_IMAGE_CANVAS_CLASS = self::BASE_CLASS_IMAGE . 'Canvas';
    CONST ELEMENT_IMAGE_FIGCAPTION_CLASS = self::BASE_CLASS_IMAGE . 'Figcaption';
    CONST ELEMENT_IMAGE_FIGURE_CLASS = self::BASE_CLASS_IMAGE . 'Figure';
    CONST ELEMENT_IMAGE_PICTURE_CLASS = self::BASE_CLASS_IMAGE . 'Picture';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'img' => self::ELEMENT_IMAGE_IMG_CLASS,
            'map' => self::ELEMENT_IMAGE_MAP_CLASS,
            'area' => self::ELEMENT_IMAGE_AREA_CLASS,
            'canvas' => self::ELEMENT_IMAGE_CANVAS_CLASS,
            'figcaption' => self::ELEMENT_IMAGE_FIGCAPTION_CLASS,
            'figure' => self::ELEMENT_IMAGE_FIGURE_CLASS,
            'picture' => self::ELEMENT_IMAGE_PICTURE_CLASS,
        );
    }

    public function render($context)
    {
    }
}