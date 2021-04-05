<?php
namespace Block\Admin\Admin;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $data = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/admin/grid.php');
    }

    public function getAdmins()
    {
        if (!$this->data) {
            $this->setAdmins();
        }
       return $this->data;
    }

    public function setAdmins()
    {
        $model = \Mage::getModel('Model\Admin');
        $data =  $model->fetchAll($this->query);
        $this->data = $data;
        return $this;
    }
}