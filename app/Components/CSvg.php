<?php
namespace Jiny\Html\Components;

use Jiny\Html\Core\CTag;
class CSvg extends CTag {

	public function __construct($items = null) {
		parent::__construct('svg', true); // CTag
		//$this->addItem($items);
	}
	
}
