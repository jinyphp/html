<?php

namespace Jiny\Html\Tests\Feature;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Load helpers if not already loaded
        if (!function_exists('CDiv')) {
            require_once __DIR__ . '/../../src/Helpers/helpers.php';
        }
    }

    public function test_cdiv_helper_function()
    {
        $div = CDiv('Content');
        $this->assertInstanceOf(\Jiny\Html\Components\CDiv::class, $div);
        $this->assertStringContainsString('<div>Content</div>', (string)$div);
    }

    public function test_cspan_helper_function()
    {
        $span = CSpan('Text');
        $this->assertInstanceOf(\Jiny\Html\Components\CSpan::class, $span);
        $this->assertStringContainsString('<span>Text</span>', (string)$span);
    }

    public function test_cbutton_helper_function()
    {
        $button = CButton('btn', 'Click');
        $this->assertInstanceOf(\Jiny\Html\Components\CButton::class, $button);
        $this->assertStringContainsString('Click', (string)$button);
    }

    public function test_ctable_helper_function()
    {
        $table = CTable();
        $this->assertInstanceOf(\Jiny\Html\Tables\CTable::class, $table);
        $this->assertStringContainsString('<table>', (string)$table);
    }

    public function test_cform_helper_function()
    {
        $form = CForm();
        $this->assertInstanceOf(\Jiny\Html\Forms\CForm::class, $form);
        $this->assertStringContainsString('<form', (string)$form);
    }

    public function test_ctextbox_helper_function()
    {
        $textbox = CTextBox('name', 'value');
        $this->assertInstanceOf(\Jiny\Html\Forms\CTextBox::class, $textbox);
        $this->assertStringContainsString('name="name"', (string)$textbox);
        $this->assertStringContainsString('value="value"', (string)$textbox);
    }

    public function test_cselect_helper_function()
    {
        $select = CSelect('options');
        $this->assertInstanceOf(\Jiny\Html\Forms\CSelect::class, $select);
        $this->assertStringContainsString('<select', (string)$select);
    }

    public function test_zbx_formatDomId_helper()
    {
        $this->assertEquals('test_value_', zbx_formatDomId('test[value]'));
        $this->assertEquals('simple', zbx_formatDomId('simple'));
        $this->assertEquals('array_0_', zbx_formatDomId('array[0]'));
    }

    public function test_complex_structure_with_helpers()
    {
        $container = CDiv()
            ->addClass('container')
            ->addItem([
                CDiv('Header')->addClass('header'),
                CDiv()
                    ->addClass('body')
                    ->addItem([
                        CForm()
                            ->setAttribute('method', 'post')
                            ->addItem([
                                CLabel('Name:', 'name'),
                                CTextBox('name'),
                                CButton('submit', 'Submit')
                            ])
                    ]),
                CDiv('Footer')->addClass('footer')
            ]);

        $output = (string)$container;
        $this->assertStringContainsString('class="container"', $output);
        $this->assertStringContainsString('class="header"', $output);
        $this->assertStringContainsString('<form', $output);
        $this->assertStringContainsString('<label', $output);
        $this->assertStringContainsString('type="text"', $output);
        $this->assertStringContainsString('<button', $output);
    }

    public function test_email_helper_function()
    {
        $email = CEmail();
        $this->assertInstanceOf(\Jiny\Html\Forms\CInput::class, $email);
        $this->assertStringContainsString('type="email"', (string)$email);
    }

    public function test_password_helper_function()
    {
        $password = CPassword();
        $this->assertInstanceOf(\Jiny\Html\Forms\CInput::class, $password);
        $this->assertStringContainsString('type="password"', (string)$password);
    }

    public function test_file_helper_function()
    {
        $file = CFile();
        $this->assertInstanceOf(\Jiny\Html\Forms\CInput::class, $file);
        $this->assertStringContainsString('type="file"', (string)$file);
    }
}