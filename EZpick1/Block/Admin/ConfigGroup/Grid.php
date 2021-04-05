<?php
namespace Block\Admin\ConfigGroup;

class Grid extends \Block\Core\Template
{
    public $query = null;
    public $configGroups = [];

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/configGroup/grid.php');
    }

    public function getConfigGroups()
    {
        if (!$this->configGroups) {
            $this->setConfigGroups();
        }
        return $this->configGroups;
    }

    public function setConfigGroups()
    {
        $configGroup = \Mage::getModel('Model\ConfigGroup');
        $configGroups = $configGroup->fetchAll($this->query);
        $this->configGroups = $configGroups;
        return $this;
    }
}