<?php
namespace Block\Admin\Customer;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $data = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/customer/grid.php');
    }

    public function getCustomers()
    {
        if (!$this->data) {
            $this->setCustomers();
        }
       return $this->data;
    }

    public function setCustomers()
    {
        $model = \Mage::getModel('Model\Customer');
        $this->query = "SELECT * FROM customer;";
        $data =  $model->fetchAll($this->query);
        $this->data = $data;
        return $this;
    }
}
?>