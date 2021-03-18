<?php
namespace Block\Admin;
\Mage::loadFileByClassName('Block\Core\Layout');
/**
 * 
 */
class Layout extends \Block\Core\Layout
{
	
	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT();
		$this->setTemplate('.\View\admin\layout.php');
	}
}

