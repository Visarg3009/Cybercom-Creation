<?php
namespace Block\Admin\CustomerGroup;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $data = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/customerGroup/grid.php');
    }

    public function getCustomerGroups()
    {
        if (!$this->data) {
            $this->setCustomerGroups();
        }
       return $this->data;
    }

    public function setCustomerGroups()
    {
        $model = \Mage::getModel('Model\CustomerGroup');
        $data =  $model->fetchAll($this->query);
        $this->data = $data;
        return $data;
    }
}
?>