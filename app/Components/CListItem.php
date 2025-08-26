<?php

namespace Jiny\Html\Components;

use Jiny\Html\Core\CTag;
class CListItem extends CTag {

	public function __construct($value) {
		parent::__construct('li', true);
		$this->addItem($value);
	}
}
