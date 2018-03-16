<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Code extends Element
{
    CONST BASE_CLASS_CODE = '\\Mediaframe\\Element\\Code\\';

    CONST ELEMENT_CODE_SCRIPT_CLASS = self::BASE_CLASS_CODE . 'Script';
    CONST ELEMENT_CODE_NOSCRIPT_CLASS = self::BASE_CLASS_CODE . 'Noscript';
    CONST ELEMENT_CODE_APPLET_CLASS = self::BASE_CLASS_CODE . 'Applet';
    CONST ELEMENT_CODE_DEFINES_CLASS = self::BASE_CLASS_CODE . 'Defines';
    CONST ELEMENT_CODE_EMBED_CLASS = self::BASE_CLASS_CODE . 'Embed';
    CONST ELEMENT_CODE_OBJECT_CLASS = self::BASE_CLASS_CODE . 'Object';
    CONST ELEMENT_CODE_OBJPARAM_CLASS = self::BASE_CLASS_CODE . 'ObjParam';
    CONST ELEMENT_CODE_FOREACH_CLASS = self::BASE_CLASS_CODE . 'ForeachElement';
    CONST ELEMENT_CODE_IMPORT_CLASS = self::BASE_CLASS_CODE . 'Import';
    CONST ELEMENT_CODE_INVOKE_CLASS = self::BASE_CLASS_CODE . 'Invoke';
    CONST ELEMENT_CODE_LOG_CLASS = self::BASE_CLASS_CODE . 'Log';
    CONST ELEMENT_CODE_ON_CLASS = self::BASE_CLASS_CODE . 'On';
    CONST ELEMENT_CODE_SET_CLASS = self::BASE_CLASS_CODE . 'Set';
    CONST ELEMENT_CODE_CONST_CLASS = self::BASE_CLASS_CODE . 'Constant';
    CONST ELEMENT_CODE_VAR_CLASS = self::BASE_CLASS_CODE . 'Variable';
    CONST ELEMENT_CODE_CSS_CLASS = self::BASE_CLASS_CODE . 'Css';
    CONST ELEMENT_CODE_ECHO_CLASS = self::BASE_CLASS_CODE . 'EchoText';
    CONST ELEMENT_CODE_ISSET_CLASS = self::BASE_CLASS_CODE . 'IssetTest';
    CONST ELEMENT_CODE_MACRO_CLASS = self::BASE_CLASS_CODE . 'Macro';
    CONST ELEMENT_CODE_COMPARE_CLASS = self::BASE_CLASS_CODE . 'Compare';
    CONST ELEMENT_CODE_SERVICE_CLASS = self::BASE_CLASS_CODE . 'Service';
    CONST ELEMENT_CODE_DATA_CLASS = self::BASE_CLASS_CODE . 'Data';
    CONST ELEMENT_CODE_SWITCH_CLASS = self::BASE_CLASS_CODE . 'SwitchElement';
    CONST ELEMENT_CODE_FORLOOP_CLASS = self::BASE_CLASS_CODE . 'ForLoop';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'script' => self::ELEMENT_CODE_SCRIPT_CLASS,
            'noscript' => self::ELEMENT_CODE_NOSCRIPT_CLASS,
            'applet' => self::ELEMENT_CODE_APPLET_CLASS,
            'defines' => self::ELEMENT_CODE_DEFINES_CLASS,
            'embed' => self::ELEMENT_CODE_EMBED_CLASS,
            'object' => self::ELEMENT_CODE_OBJECT_CLASS,
            'objparam' => self::ELEMENT_CODE_OBJPARAM_CLASS,
            'foreach' => self::ELEMENT_CODE_FOREACH_CLASS,
            'import' => self::ELEMENT_CODE_IMPORT_CLASS,
            'invoke' => self::ELEMENT_CODE_INVOKE_CLASS,
            'log' => self::ELEMENT_CODE_LOG_CLASS,
            'on' => self::ELEMENT_CODE_ON_CLASS,
            'set' => self::ELEMENT_CODE_SET_CLASS,
            'const' => self::ELEMENT_CODE_CONST_CLASS,
            'var' => self::ELEMENT_CODE_VAR_CLASS,
            'css' => self::ELEMENT_CODE_CSS_CLASS,
            'echo' => self::ELEMENT_CODE_ECHO_CLASS,
            'isset' => self::ELEMENT_CODE_ISSET_CLASS,
            'macro' => self::ELEMENT_CODE_MACRO_CLASS,
            'compare' => self::ELEMENT_CODE_COMPARE_CLASS,
            'service' => self::ELEMENT_CODE_SERVICE_CLASS,
            'data' => self::ELEMENT_CODE_DATA_CLASS,
            'switch' => self::ELEMENT_CODE_SWITCH_CLASS,
            'for' => self::ELEMENT_CODE_FORLOOP_CLASS,
        );
    }

    public function render($context)
    {
    }
}