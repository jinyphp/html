<?php

namespace Jiny\Html\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Jiny\Html\Components\CDiv;
use Jiny\Html\Components\CSpan;
use Jiny\Html\Components\CButton;
use Jiny\Html\Components\CLink;
use Jiny\Html\Components\CList;
use Jiny\Html\Components\CListItem;

class ComponentsTest extends TestCase
{
    public function test_cdiv_creates_div_element()
    {
        $div = new CDiv('Content');
        $this->assertStringContainsString('<div>Content</div>', $div->toString());
    }

    public function test_cdiv_sets_width()
    {
        $div = new CDiv();
        $div->setWidth(500);
        $this->assertStringContainsString('width: 500px;', $div->toString());
        
        $div2 = new CDiv();
        $div2->setWidth(100, '%');
        $this->assertStringContainsString('width: 100%;', $div2->toString());
    }

    public function test_cdiv_sets_adaptive_width()
    {
        $div = new CDiv();
        $div->setAdaptiveWidth(800);
        $output = $div->toString();
        $this->assertStringContainsString('max-width: 800px;', $output);
        $this->assertStringContainsString('width: 100%;', $output);
    }

    public function test_cspan_creates_span_element()
    {
        $span = new CSpan('Text');
        $this->assertEquals('<span>Text</span>', $span->toString());
    }

    public function test_cbutton_creates_button()
    {
        $button = new CButton('btn-test', 'Click Me');
        $output = $button->toString();
        $this->assertStringContainsString('<button', $output);
        $this->assertStringContainsString('type="button"', $output);
        $this->assertStringContainsString('Click Me', $output);
    }

    public function test_clink_creates_link()
    {
        $link = new CLink('Google', 'https://google.com');
        $output = $link->toString();
        $this->assertStringContainsString('<a', $output);
        $this->assertStringContainsString('href="https://google.com"', $output);
        $this->assertStringContainsString('Google', $output);
    }

    public function test_clist_creates_ul_list()
    {
        $list = new CList(['Item 1', 'Item 2', 'Item 3']);
        $output = $list->toString();
        $this->assertStringContainsString('<ul>', $output);
        $this->assertStringContainsString('<li>Item 1</li>', $output);
        $this->assertStringContainsString('<li>Item 2</li>', $output);
        $this->assertStringContainsString('<li>Item 3</li>', $output);
        $this->assertStringContainsString('</ul>', $output);
    }

    public function test_clistitem_creates_li_element()
    {
        $item = new CListItem('List Item');
        $this->assertEquals('<li>List Item</li>', $item->toString());
    }

    public function test_components_method_chaining()
    {
        $div = new CDiv();
        $result = $div->addClass('container')
            ->setId('main')
            ->setAttribute('data-test', 'value')
            ->addItem('Content');
        
        $this->assertInstanceOf(CDiv::class, $result);
        $output = $div->toString();
        $this->assertStringContainsString('class="container"', $output);
        $this->assertStringContainsString('id="main"', $output);
        $this->assertStringContainsString('data-test="value"', $output);
        $this->assertStringContainsString('Content', $output);
    }

    public function test_nested_components()
    {
        $container = new CDiv();
        $span = new CSpan('Nested');
        $container->addItem($span);
        
        $this->assertEquals('<div><span>Nested</span></div>', $container->toString());
    }
}