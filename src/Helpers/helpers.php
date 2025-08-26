<?php

/**
 * Jiny HTML Helper Functions
 */

use Jiny\Html\Components\{
    CDiv,
    CSpan,
    CButton,
    CLink,
    CList,
    CListItem,
    CSmall,
    CSvg,
    CVar
};

use Jiny\Html\Tables\{
    CTable,
    CTableInfo,
    CRow,
    CCol,
    CColHeader,
    CRowHeader
};

use Jiny\Html\Forms\{
    CForm,
    CLabel,
    CInput,
    CTextBox,
    CCheckBox,
    CSelect,
    CMultiSelect,
    CFormList,
    CRadioButtonList,
    CTextArea
};

/**
 * HTML Components
 */

function CDiv($items = null) {
    if($items) {
        return new CDiv($items);
    } else {
        return new CDiv();
    }
}

function CSpan($items = null) {
    return new CSpan($items);
}

function CSmall($items = null) {
    return new CSmall($items);
}

function CSvg($items = null) {
    return new CSvg($items);
}

function CLink($items = null, $url = null) {
    return new CLink($items, $url);
}

function CButton($name = 'button', $caption = '') {
    return new CButton($name, $caption);
}

function CListItem($items = null) {
    return new CListItem($items);
}

function CList($values = null) {
    return new CList($values);
}

/**
 * Table Components
 */

function CTable() {
    return new CTable();
}

function CTableInfo() {
    return new CTableInfo();
}

function CRow($item = null, $heading_column = null) {
    return new CRow($item, $heading_column);
}

function CCol($item = null) {
    return new CCol($item);
}

function CColHeader($item = null) {
    return new CColHeader($item);
}

function CRowHeader() {
    return new CRowHeader();
}

/**
 * Form Components
 */

function CForm() {
    return new CForm();
}

function CLabel($label = null, $for = null) {
    return new CLabel($label, $for);
}

function CEmail() {
    return new CInput('email');
}

function CPassword() {
    return new CInput('password');
}

function CFile() {
    return new CInput('file');
}

function CTextBox($name = 'textbox', $value = '', $readonly = false, $maxlength = 255) {
    return new CTextBox($name, $value, $readonly, $maxlength);
}

function CCheckBox($name = 'checkbox', $value = '1') {
    return new CCheckBox($name, $value);
}

function CSelect($name, $value = null) {
    return new CSelect($name, $value);
}

function CMultiSelect(array $options = []) {
    return new CMultiSelect($options);
}

function CFormList($id = null) {
    return new CFormList($id);
}

function CRadioButtonList($name, $value) {
    return new CRadioButtonList($name, $value);
}

function CTextarea() {
    return new CTextArea();
}

/**
 * Utility Functions
 */

function zbx_formatDomId($value) {
    return str_replace(['[', ']'], ['_', ''], $value);
}