<?php 
namespace Jiny\Html\Tables;

use Jiny\Html\Core\CTag;

class CTableColumn extends CTag {

	protected $header;

	public function __construct($item = '') {
		parent::__construct('col', true);

		$this->header = ($item instanceof CCol)
			? $item
			: (new CColHeader($item));
	}

	/**
	 * Returns header cell element for column.
	 *
	 * @return CCol
	 */
	public function getHeader(): CCol {
		return $this->header;
	}
}
