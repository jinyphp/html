<?php

namespace Jiny\Html\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Jiny\Html\Core\CTag;

class CTagTest extends TestCase
{
    public function test_creates_basic_tag()
    {
        $tag = new CTag('div');
        $this->assertEquals('<div></div>', $tag->toString());
    }

    public function test_creates_tag_with_content()
    {
        $tag = new CTag('div');
        $tag->addItem('Hello World');
        $this->assertEquals('<div>Hello World</div>', $tag->toString());
    }

    public function test_creates_self_closing_tag()
    {
        $tag = new CTag('br', false);
        $this->assertEquals('<br />', $tag->toString());
    }

    public function test_adds_attributes()
    {
        $tag = new CTag('div');
        $tag->setAttribute('id', 'test-id')
            ->setAttribute('class', 'test-class');
        
        $this->assertStringContainsString('id="test-id"', $tag->toString());
        $this->assertStringContainsString('class="test-class"', $tag->toString());
    }

    public function test_adds_multiple_classes()
    {
        $tag = new CTag('div');
        $tag->addClass('class1')
            ->addClass('class2')
            ->addClass('class3');
        
        $this->assertStringContainsString('class="class1 class2 class3"', $tag->toString());
    }

    public function test_adds_styles()
    {
        $tag = new CTag('div');
        $tag->addStyle('color: red;')
            ->addStyle('font-size: 14px;');
        
        $this->assertStringContainsString('style="color: red; font-size: 14px;"', $tag->toString());
    }

    public function test_sets_id()
    {
        $tag = new CTag('div');
        $tag->setId('unique-id');
        
        $this->assertStringContainsString('id="unique-id"', $tag->toString());
    }

    public function test_escapes_attribute_values()
    {
        $tag = new CTag('div');
        $tag->setAttribute('data-value', '"test" & <script>');
        
        $this->assertStringContainsString('data-value="&quot;test&quot; &amp; &lt;script&gt;"', $tag->toString());
    }

    public function test_nested_tags()
    {
        $parent = new CTag('div');
        $child = new CTag('span');
        $child->addItem('Child content');
        
        $parent->addItem($child);
        
        $this->assertEquals('<div><span>Child content</span></div>', $parent->toString());
    }

    public function test_multiple_items()
    {
        $tag = new CTag('div');
        $tag->addItem(['Item 1', 'Item 2', 'Item 3']);
        
        $this->assertEquals('<div>Item 1Item 2Item 3</div>', $tag->toString());
    }

    public function test_null_items_ignored()
    {
        $tag = new CTag('div');
        $tag->addItem(null);
        $tag->addItem('Content');
        $tag->addItem(null);
        
        $this->assertEquals('<div>Content</div>', $tag->toString());
    }

    public function test_string_cast()
    {
        $tag = new CTag('div');
        $tag->addItem('Test');
        
        $this->assertEquals('<div>Test</div>', (string)$tag);
    }
}