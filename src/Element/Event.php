<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 9/24/2017
 * Time: 9:48 AM
 */

namespace Mediaframe\Element;

use Mediaframe\Element;

class Event extends Element
{
    CONST BASE_CLASS_EVENT = '\\Mediaframe\\Element\\Event\\';

    CONST ELEMENT_EVENT_ONAFTERPRINT_CLASS = self::BASE_CLASS_EVENT . 'OnAfterprint';
    CONST ELEMENT_EVENT_ONBEFOREPRINT_CLASS = self::BASE_CLASS_EVENT . 'OnBeforeprint';
    CONST ELEMENT_EVENT_ONBEFOREUNLOAD_CLASS = self::BASE_CLASS_EVENT . 'OnBeforeunload';
    CONST ELEMENT_EVENT_ONERROR_CLASS = self::BASE_CLASS_EVENT . 'OnError';
    CONST ELEMENT_EVENT_ONHASHCHANGE_CLASS = self::BASE_CLASS_EVENT . 'OnHashchange';
    CONST ELEMENT_EVENT_ONLOAD_CLASS = self::BASE_CLASS_EVENT . 'OnLoad';
    CONST ELEMENT_EVENT_ONMESSAGE_CLASS = self::BASE_CLASS_EVENT . 'OnMessage';
    CONST ELEMENT_EVENT_ONOFFLINE_CLASS = self::BASE_CLASS_EVENT . 'OnOffline';
    CONST ELEMENT_EVENT_ONONLINE_CLASS = self::BASE_CLASS_EVENT . 'OnOnline';
    CONST ELEMENT_EVENT_ONPAGEHIDE_CLASS = self::BASE_CLASS_EVENT . 'OnPagehide';
    CONST ELEMENT_EVENT_ONPAGESHOW_CLASS = self::BASE_CLASS_EVENT . 'OnPageshow';
    CONST ELEMENT_EVENT_ONPOPSTATE_CLASS = self::BASE_CLASS_EVENT . 'OnPopstate';
    CONST ELEMENT_EVENT_ONRESIZE_CLASS = self::BASE_CLASS_EVENT . 'OnResize';
    CONST ELEMENT_EVENT_ONSTORAGE_CLASS = self::BASE_CLASS_EVENT . 'OnStorage';
    CONST ELEMENT_EVENT_ONUNLOAD_CLASS = self::BASE_CLASS_EVENT . 'OnUnload';
    CONST ELEMENT_EVENT_ONBLUR_CLASS = self::BASE_CLASS_EVENT . 'OnBlur';
    CONST ELEMENT_EVENT_ONCHANGE_CLASS = self::BASE_CLASS_EVENT . 'OnChange';
    CONST ELEMENT_EVENT_ONCONTEXTMENU_CLASS = self::BASE_CLASS_EVENT . 'OnContextmenu';
    CONST ELEMENT_EVENT_ONFOCUS_CLASS = self::BASE_CLASS_EVENT . 'OnFocus';
    CONST ELEMENT_EVENT_ONINPUT_CLASS = self::BASE_CLASS_EVENT . 'OnInput';
    CONST ELEMENT_EVENT_ONINVALID_CLASS = self::BASE_CLASS_EVENT . 'OnInvalid';
    CONST ELEMENT_EVENT_ONRESET_CLASS = self::BASE_CLASS_EVENT . 'OnReset';
    CONST ELEMENT_EVENT_ONSEARCH_CLASS = self::BASE_CLASS_EVENT . 'OnSearch';
    CONST ELEMENT_EVENT_ONSELECT_CLASS = self::BASE_CLASS_EVENT . 'OnSelect';
    CONST ELEMENT_EVENT_ONSUBMIT_CLASS = self::BASE_CLASS_EVENT . 'OnSubmit';
    CONST ELEMENT_EVENT_ONKEYDOWN_CLASS = self::BASE_CLASS_EVENT . 'OnKeydown';
    CONST ELEMENT_EVENT_ONKEYPRESS_CLASS = self::BASE_CLASS_EVENT . 'OnKeypress';
    CONST ELEMENT_EVENT_ONKEYUP_CLASS = self::BASE_CLASS_EVENT . 'OnKeyup';
    CONST ELEMENT_EVENT_ONCLICK_CLASS = self::BASE_CLASS_EVENT . 'OnClick';
    CONST ELEMENT_EVENT_ONDBLCLICK_CLASS = self::BASE_CLASS_EVENT . 'OnDblclick';
    CONST ELEMENT_EVENT_ONMOUSEDOWN_CLASS = self::BASE_CLASS_EVENT . 'OnMousedown';
    CONST ELEMENT_EVENT_ONMOUSEMOVE_CLASS = self::BASE_CLASS_EVENT . 'OnMousemove';
    CONST ELEMENT_EVENT_ONMOUSEOUT_CLASS = self::BASE_CLASS_EVENT . 'OnMouseout';
    CONST ELEMENT_EVENT_ONMOUSEOVER_CLASS = self::BASE_CLASS_EVENT . 'OnMouseover';
    CONST ELEMENT_EVENT_ONMOUSEUP_CLASS = self::BASE_CLASS_EVENT . 'OnMouseup';
    CONST ELEMENT_EVENT_ONMOUSEWHEEL_CLASS = self::BASE_CLASS_EVENT . 'OnMousewheel';
    CONST ELEMENT_EVENT_ONWHEEL_CLASS = self::BASE_CLASS_EVENT . 'OnWheel';
    CONST ELEMENT_EVENT_ONDRAG_CLASS = self::BASE_CLASS_EVENT . 'OnDrag';
    CONST ELEMENT_EVENT_ONDRAGEND_CLASS = self::BASE_CLASS_EVENT . 'OnDragend';
    CONST ELEMENT_EVENT_ONDRAGENTER_CLASS = self::BASE_CLASS_EVENT . 'OnDragenter';
    CONST ELEMENT_EVENT_ONDRAGLEAVE_CLASS = self::BASE_CLASS_EVENT . 'OnDragleave';
    CONST ELEMENT_EVENT_ONDRAGOVER_CLASS = self::BASE_CLASS_EVENT . 'OnDragover';
    CONST ELEMENT_EVENT_ONDRAGSTART_CLASS = self::BASE_CLASS_EVENT . 'OnDragstart';
    CONST ELEMENT_EVENT_ONDROP_CLASS = self::BASE_CLASS_EVENT . 'OnDrop';
    CONST ELEMENT_EVENT_ONSCROLL_CLASS = self::BASE_CLASS_EVENT . 'OnScroll';
    CONST ELEMENT_EVENT_ONCOPY_CLASS = self::BASE_CLASS_EVENT . 'OnCopy';
    CONST ELEMENT_EVENT_ONCUT_CLASS = self::BASE_CLASS_EVENT . 'OnCut';
    CONST ELEMENT_EVENT_ONPASTE_CLASS = self::BASE_CLASS_EVENT . 'OnPaste';
    CONST ELEMENT_EVENT_ONABORT_CLASS = self::BASE_CLASS_EVENT . 'OnAbort';
    CONST ELEMENT_EVENT_ONCANPLAY_CLASS = self::BASE_CLASS_EVENT . 'OnCanplay';
    CONST ELEMENT_EVENT_ONCANPLAYTHROUGH_CLASS = self::BASE_CLASS_EVENT . 'OnCanplaythrough';
    CONST ELEMENT_EVENT_ONCUECHANGE_CLASS = self::BASE_CLASS_EVENT . 'OnCuechange';
    CONST ELEMENT_EVENT_ONDURATIONCHANGE_CLASS = self::BASE_CLASS_EVENT . 'OnDurationchange';
    CONST ELEMENT_EVENT_ONEMPTIED_CLASS = self::BASE_CLASS_EVENT . 'OnEmptied';
    CONST ELEMENT_EVENT_ONENDED_CLASS = self::BASE_CLASS_EVENT . 'OnEnded';
    CONST ELEMENT_EVENT_ONLOADEDDATA_CLASS = self::BASE_CLASS_EVENT . 'OnLoadeddata';
    CONST ELEMENT_EVENT_ONLOADEDMETADATA_CLASS = self::BASE_CLASS_EVENT . 'OnLoadedmetadata';
    CONST ELEMENT_EVENT_ONLOADSTART_CLASS = self::BASE_CLASS_EVENT . 'OnLoadstart';
    CONST ELEMENT_EVENT_ONPAUSE_CLASS = self::BASE_CLASS_EVENT . 'OnPause';
    CONST ELEMENT_EVENT_ONPLAY_CLASS = self::BASE_CLASS_EVENT . 'OnPlay';
    CONST ELEMENT_EVENT_ONPLAYING_CLASS = self::BASE_CLASS_EVENT . 'OnPlaying';
    CONST ELEMENT_EVENT_ONPROGRESS_CLASS = self::BASE_CLASS_EVENT . 'OnProgress';
    CONST ELEMENT_EVENT_ONRATECHANGE_CLASS = self::BASE_CLASS_EVENT . 'OnRatechange';
    CONST ELEMENT_EVENT_ONSEEKED_CLASS = self::BASE_CLASS_EVENT . 'OnSeeked';
    CONST ELEMENT_EVENT_ONSEEKING_CLASS = self::BASE_CLASS_EVENT . 'OnSeeking';
    CONST ELEMENT_EVENT_ONSTALLED_CLASS = self::BASE_CLASS_EVENT . 'OnStalled';
    CONST ELEMENT_EVENT_ONSUSPEND_CLASS = self::BASE_CLASS_EVENT . 'OnSuspend';
    CONST ELEMENT_EVENT_ONTIMEUPDATE_CLASS = self::BASE_CLASS_EVENT . 'OnTimeupdate';
    CONST ELEMENT_EVENT_ONVOLUMECHANGE_CLASS = self::BASE_CLASS_EVENT . 'OnVolumechange';
    CONST ELEMENT_EVENT_ONWAITING_CLASS = self::BASE_CLASS_EVENT . 'OnWaiting';
    CONST ELEMENT_EVENT_ONSHOW_CLASS = self::BASE_CLASS_EVENT . 'OnShow';
    CONST ELEMENT_EVENT_ONTOGGLE_CLASS = self::BASE_CLASS_EVENT . 'OnToggle';

    public function __construct($tag_name)
    {
        parent::__construct($tag_name);
    }

    public static function getTagMapping()
    {
        return array(
            'onafterprint' => self::ELEMENT_EVENT_ONAFTERPRINT_CLASS,
            'onbeforeprint' => self::ELEMENT_EVENT_ONBEFOREPRINT_CLASS,
            'onbeforeunload' => self::ELEMENT_EVENT_ONBEFOREUNLOAD_CLASS,
            'onerror' => self::ELEMENT_EVENT_ONERROR_CLASS,
            'onhashchange' => self::ELEMENT_EVENT_ONHASHCHANGE_CLASS,
            'onload' => self::ELEMENT_EVENT_ONLOAD_CLASS,
            'onmessage' => self::ELEMENT_EVENT_ONMESSAGE_CLASS,
            'onoffline' => self::ELEMENT_EVENT_ONOFFLINE_CLASS,
            'ononline' => self::ELEMENT_EVENT_ONONLINE_CLASS,
            'onpagehide' => self::ELEMENT_EVENT_ONPAGEHIDE_CLASS,
            'onpageshow' => self::ELEMENT_EVENT_ONPAGESHOW_CLASS,
            'onpopstate' => self::ELEMENT_EVENT_ONPOPSTATE_CLASS,
            'onresize' => self::ELEMENT_EVENT_ONRESIZE_CLASS,
            'onstorage' => self::ELEMENT_EVENT_ONSTORAGE_CLASS,
            'onunload' => self::ELEMENT_EVENT_ONUNLOAD_CLASS,
            'onblur' => self::ELEMENT_EVENT_ONBLUR_CLASS,
            'onchange' => self::ELEMENT_EVENT_ONCHANGE_CLASS,
            'oncontextmenu' => self::ELEMENT_EVENT_ONCONTEXTMENU_CLASS,
            'onfocus' => self::ELEMENT_EVENT_ONFOCUS_CLASS,
            'oninput' => self::ELEMENT_EVENT_ONINPUT_CLASS,
            'oninvalid' => self::ELEMENT_EVENT_ONINVALID_CLASS,
            'onreset' => self::ELEMENT_EVENT_ONRESET_CLASS,
            'onsearch' => self::ELEMENT_EVENT_ONSEARCH_CLASS,
            'onselect' => self::ELEMENT_EVENT_ONSELECT_CLASS,
            'onsubmit' => self::ELEMENT_EVENT_ONSUBMIT_CLASS,
            'onkeydown' => self::ELEMENT_EVENT_ONKEYDOWN_CLASS,
            'onkeypress' => self::ELEMENT_EVENT_ONKEYPRESS_CLASS,
            'onkeyup' => self::ELEMENT_EVENT_ONKEYUP_CLASS,
            'onclick' => self::ELEMENT_EVENT_ONCLICK_CLASS,
            'ondblclick' => self::ELEMENT_EVENT_ONDBLCLICK_CLASS,
            'onmousedown' => self::ELEMENT_EVENT_ONMOUSEDOWN_CLASS,
            'onmousemove' => self::ELEMENT_EVENT_ONMOUSEMOVE_CLASS,
            'onmouseout' => self::ELEMENT_EVENT_ONMOUSEOUT_CLASS,
            'onmouseover' => self::ELEMENT_EVENT_ONMOUSEOVER_CLASS,
            'onmouseup' => self::ELEMENT_EVENT_ONMOUSEUP_CLASS,
            'onmousewheel' => self::ELEMENT_EVENT_ONMOUSEWHEEL_CLASS,
            'onwheel' => self::ELEMENT_EVENT_ONWHEEL_CLASS,
            'ondrag' => self::ELEMENT_EVENT_ONDRAG_CLASS,
            'ondragend' => self::ELEMENT_EVENT_ONDRAGEND_CLASS,
            'ondragenter' => self::ELEMENT_EVENT_ONDRAGENTER_CLASS,
            'ondragleave' => self::ELEMENT_EVENT_ONDRAGLEAVE_CLASS,
            'ondragover' => self::ELEMENT_EVENT_ONDRAGOVER_CLASS,
            'ondragstart' => self::ELEMENT_EVENT_ONDRAGSTART_CLASS,
            'ondrop' => self::ELEMENT_EVENT_ONDROP_CLASS,
            'onscroll' => self::ELEMENT_EVENT_ONSCROLL_CLASS,
            'oncopy' => self::ELEMENT_EVENT_ONCOPY_CLASS,
            'oncut' => self::ELEMENT_EVENT_ONCUT_CLASS,
            'onpaste' => self::ELEMENT_EVENT_ONPASTE_CLASS,
            'onabort' => self::ELEMENT_EVENT_ONABORT_CLASS,
            'oncanplay' => self::ELEMENT_EVENT_ONCANPLAY_CLASS,
            'oncanplaythrough' => self::ELEMENT_EVENT_ONCANPLAYTHROUGH_CLASS,
            'oncuechange' => self::ELEMENT_EVENT_ONCUECHANGE_CLASS,
            'ondurationchange' => self::ELEMENT_EVENT_ONDURATIONCHANGE_CLASS,
            'onemptied' => self::ELEMENT_EVENT_ONEMPTIED_CLASS,
            'onended' => self::ELEMENT_EVENT_ONENDED_CLASS,
            'onloadeddata' => self::ELEMENT_EVENT_ONLOADEDDATA_CLASS,
            'onloadedmetadata' => self::ELEMENT_EVENT_ONLOADEDMETADATA_CLASS,
            'onloadstart' => self::ELEMENT_EVENT_ONLOADSTART_CLASS,
            'onpause' => self::ELEMENT_EVENT_ONPAUSE_CLASS,
            'onplay' => self::ELEMENT_EVENT_ONPLAY_CLASS,
            'onplaying' => self::ELEMENT_EVENT_ONPLAYING_CLASS,
            'onprogress' => self::ELEMENT_EVENT_ONPROGRESS_CLASS,
            'onratechange' => self::ELEMENT_EVENT_ONRATECHANGE_CLASS,
            'onseeked' => self::ELEMENT_EVENT_ONSEEKED_CLASS,
            'onseeking' => self::ELEMENT_EVENT_ONSEEKING_CLASS,
            'onstalled' => self::ELEMENT_EVENT_ONSTALLED_CLASS,
            'onsuspend' => self::ELEMENT_EVENT_ONSUSPEND_CLASS,
            'ontimeupdate' => self::ELEMENT_EVENT_ONTIMEUPDATE_CLASS,
            'onvolumechange' => self::ELEMENT_EVENT_ONVOLUMECHANGE_CLASS,
            'onwaiting' => self::ELEMENT_EVENT_ONWAITING_CLASS,
            'onshow' => self::ELEMENT_EVENT_ONSHOW_CLASS,
            'ontoggle' => self::ELEMENT_EVENT_ONTOGGLE_CLASS
        );
    }

    public function render($context)
    {
    }
}