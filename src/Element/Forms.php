<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Forms extends Element
{
    CONST BASE_CLASS_FORM = '\\Mediaframe\\Element\\Forms\\';

    CONST ELEMENT_FORM_FORM_CLASS = self::BASE_CLASS_FORM . 'Form';
    CONST ELEMENT_FORM_INPUT_CLASS = self::BASE_CLASS_FORM . 'Input';
    CONST ELEMENT_FORM_TEXTAREA_CLASS = self::BASE_CLASS_FORM . 'Textarea';
    CONST ELEMENT_FORM_BUTTON_CLASS = self::BASE_CLASS_FORM . 'Button';
    CONST ELEMENT_FORM_SELECT_CLASS = self::BASE_CLASS_FORM . 'Select';
    CONST ELEMENT_FORM_OPTGROUP_CLASS = self::BASE_CLASS_FORM . 'Optgroup';
    CONST ELEMENT_FORM_OPTION_CLASS = self::BASE_CLASS_FORM . 'Option';
    CONST ELEMENT_FORM_LABEL_CLASS = self::BASE_CLASS_FORM . 'Label';
    CONST ELEMENT_FORM_FIELDSET_CLASS = self::BASE_CLASS_FORM . 'Fieldset';
    CONST ELEMENT_FORM_LEGEND_CLASS = self::BASE_CLASS_FORM . 'Legend';
    CONST ELEMENT_FORM_DATALIST_CLASS = self::BASE_CLASS_FORM . 'Datalist';
    CONST ELEMENT_FORM_KEYGEN_CLASS = self::BASE_CLASS_FORM . 'Keygen';
    CONST ELEMENT_FORM_OUTPUT_CLASS = self::BASE_CLASS_FORM . 'Output';
    //CONST ELEMENT_FORM_ACTION_CLASS = self::BASE_CLASS_FORM . 'Action';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'form' => self::ELEMENT_FORM_FORM_CLASS,
            'input' => self::ELEMENT_FORM_INPUT_CLASS,
            'textarea' => self::ELEMENT_FORM_TEXTAREA_CLASS,
            'button' => self::ELEMENT_FORM_BUTTON_CLASS,
            'select' => self::ELEMENT_FORM_SELECT_CLASS,
            'optgroup' => self::ELEMENT_FORM_OPTGROUP_CLASS,
            'option' => self::ELEMENT_FORM_OPTION_CLASS,
            'label' => self::ELEMENT_FORM_LABEL_CLASS,
            'fieldset' => self::ELEMENT_FORM_FIELDSET_CLASS,
            'legend' => self::ELEMENT_FORM_LEGEND_CLASS,
            'datalist' => self::ELEMENT_FORM_DATALIST_CLASS,
            'keygen' => self::ELEMENT_FORM_KEYGEN_CLASS,
            'output' => self::ELEMENT_FORM_OUTPUT_CLASS,
            //'action' => self::ELEMENT_FORM_ACTION_CLASS,
        );
    }

    public function render($context)
    {
    }
}