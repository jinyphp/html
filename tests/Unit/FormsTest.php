<?php

namespace Jiny\Html\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Jiny\Html\Forms\CForm;
use Jiny\Html\Forms\CInput;
use Jiny\Html\Forms\CTextBox;
use Jiny\Html\Forms\CCheckBox;
use Jiny\Html\Forms\CSelect;
use Jiny\Html\Forms\CTextArea;
use Jiny\Html\Forms\CLabel;

class FormsTest extends TestCase
{
    public function test_cform_creates_form_element()
    {
        $form = new CForm();
        $output = $form->toString();
        $this->assertStringContainsString('<form', $output);
        $this->assertStringContainsString('</form>', $output);
    }

    public function test_cform_sets_method_and_action()
    {
        $form = new CForm();
        $form->setAttribute('method', 'POST')
             ->setAttribute('action', '/submit');
        
        $output = $form->toString();
        $this->assertStringContainsString('method="POST"', $output);
        $this->assertStringContainsString('action="/submit"', $output);
    }

    public function test_cinput_creates_input_element()
    {
        $input = new CInput('text');
        $input->setAttribute('name', 'username');
        
        $output = $input->toString();
        $this->assertStringContainsString('<input', $output);
        $this->assertStringContainsString('type="text"', $output);
        $this->assertStringContainsString('name="username"', $output);
    }

    public function test_ctextbox_creates_text_input()
    {
        $textbox = new CTextBox('username', 'john', false, 50);
        
        $output = $textbox->toString();
        $this->assertStringContainsString('type="text"', $output);
        $this->assertStringContainsString('name="username"', $output);
        $this->assertStringContainsString('value="john"', $output);
        $this->assertStringContainsString('maxlength="50"', $output);
    }

    public function test_ctextbox_readonly()
    {
        $textbox = new CTextBox('field', 'value', true);
        $output = $textbox->toString();
        $this->assertStringContainsString('readonly', $output);
    }

    public function test_ccheckbox_creates_checkbox()
    {
        $checkbox = new CCheckBox('agree', '1');
        
        $output = $checkbox->toString();
        $this->assertStringContainsString('type="checkbox"', $output);
        $this->assertStringContainsString('name="agree"', $output);
        $this->assertStringContainsString('value="1"', $output);
    }

    public function test_cselect_creates_select_element()
    {
        $select = new CSelect('country');
        $select->addOption('us', 'United States');
        $select->addOption('ca', 'Canada');
        
        $output = $select->toString();
        $this->assertStringContainsString('<select', $output);
        $this->assertStringContainsString('name="country"', $output);
        $this->assertStringContainsString('<option value="us">United States</option>', $output);
        $this->assertStringContainsString('<option value="ca">Canada</option>', $output);
        $this->assertStringContainsString('</select>', $output);
    }

    public function test_ctextarea_creates_textarea()
    {
        $textarea = new CTextArea();
        $textarea->setAttribute('name', 'description')
                 ->setAttribute('rows', '5')
                 ->setAttribute('cols', '40')
                 ->addItem('Default text');
        
        $output = $textarea->toString();
        $this->assertStringContainsString('<textarea', $output);
        $this->assertStringContainsString('name="description"', $output);
        $this->assertStringContainsString('rows="5"', $output);
        $this->assertStringContainsString('cols="40"', $output);
        $this->assertStringContainsString('Default text', $output);
        $this->assertStringContainsString('</textarea>', $output);
    }

    public function test_clabel_creates_label()
    {
        $label = new CLabel('Email Address:', 'email');
        
        $output = $label->toString();
        $this->assertStringContainsString('<label', $output);
        $this->assertStringContainsString('for="email"', $output);
        $this->assertStringContainsString('Email Address:', $output);
        $this->assertStringContainsString('</label>', $output);
    }

    public function test_form_with_multiple_inputs()
    {
        $form = new CForm();
        $form->setAttribute('method', 'POST');
        
        $label = new CLabel('Username:', 'username');
        $input = new CTextBox('username');
        $checkbox = new CCheckBox('remember', '1');
        
        $form->addItem([$label, $input, $checkbox]);
        
        $output = $form->toString();
        $this->assertStringContainsString('<form', $output);
        $this->assertStringContainsString('<label', $output);
        $this->assertStringContainsString('<input', $output);
        $this->assertStringContainsString('type="checkbox"', $output);
    }
}