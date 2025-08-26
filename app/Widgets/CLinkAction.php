<?php
namespace Jiny\Html\Widgets;
namespace App\Html;

class CLinkAction extends CLink {

	public function __construct($items = null) {
		parent::__construct($items);

		$this->addClass(ZBX_STYLE_LINK_ACTION);
	}
}
