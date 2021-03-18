<?php
namespace Block\Core\Edit;
\Mage::loadFileByClassName('Block\Core\Template');

class Tabs extends \Block\Core\Template
{
	protected $tableRow = null;

	public function __CONSTRUCT()
	{
		$this->setTemplate('./View/core/edit/tabs.php');
		$this->prepareTab();
	}

	public function getTableRow()
	{
		return $this->tableRow;
	}

	public function setTableRow(\Model\Core\Table $tableRow)
	{
		$this->tableRow = $tableRow;
		return $this;
	}

	public function prepareTab()
	{
		return $this;
	}
}
