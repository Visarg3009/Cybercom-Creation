<?php
namespace Block\Admin\ConfigGroup\Edit\Tabs;

class Configuration extends \Block\Core\Edit
{
    protected $configs = [];
    protected $query = null;

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/configGroup/edit/tabs/configuration.php');
    }

    public function getConfigs()
    {
        if (!$this->configs) {
            $this->setConfigs();
        }
        return $this->configs;
    }

    public function setConfigs()
    {
        $config = \Mage::getModel('Model\ConfigGroup\Config');
        $groupId = $this->getTableRow()->groupId;
        $query = "SELECT * FROM config WHERE groupId = '{$groupId}';";
        $configs = $config->fetchAll($query);
        $this->configs = $configs;
        return $this;
    }
}