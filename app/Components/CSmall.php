<?php
namespace Jiny\Html\Components;

use Jiny\Html\Core\CTag;
class CSmall extends CTag {

	public function __construct($items = null) {
		parent::__construct('small', true); // CTag
		$this->addItem($items);
	}
	
}
