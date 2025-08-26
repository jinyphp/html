<?php
namespace Jiny\Html\Core;

class CTag
{
    protected $tag;
    protected $items = [];
    protected $attributes = [];
    protected $styles = [];
    protected $paired;

    public function __construct($tag, $paired = true)
    {
        $this->tag = $tag;
        $this->paired = $paired;
    }

    public function addItem($items)
    {
        if ($items === null) {
            return $this;
        }
        
        if (!is_array($items)) {
            $items = [$items];
        }
        
        foreach ($items as $item) {
            $this->items[] = $item;
        }
        
        return $this;
    }

    public function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function getAttribute($name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function addClass($class)
    {
        $classes = $this->getAttribute('class') ?? '';
        if ($classes) {
            $classes .= ' ';
        }
        $classes .= $class;
        $this->setAttribute('class', $classes);
        return $this;
    }

    public function addStyle($style)
    {
        $this->styles[] = $style;
        return $this;
    }

    public function setId($id)
    {
        $this->setAttribute('id', $id);
        return $this;
    }

    public function toString()
    {
        $html = '<' . $this->tag;
        
        // Add attributes
        foreach ($this->attributes as $name => $value) {
            $html .= ' ' . $name . '="' . htmlspecialchars($value) . '"';
        }
        
        // Add styles
        if (!empty($this->styles)) {
            $html .= ' style="' . implode(' ', $this->styles) . '"';
        }
        
        if ($this->paired) {
            $html .= '>';
            foreach ($this->items as $item) {
                if (is_object($item) && method_exists($item, 'toString')) {
                    $html .= $item->toString();
                } else {
                    $html .= (string)$item;
                }
            }
            $html .= '</' . $this->tag . '>';
        } else {
            $html .= ' />';
        }
        
        return $html;
    }

    public function __toString()
    {
        return $this->toString();
    }
}