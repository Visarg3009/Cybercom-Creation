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
        $this->query = "SELECT customer.`customer_Id`, customer.`firstName`, customer.`lastName`, customer_group.`Name`, customer.`email`, customer.`mobile`,customer_address.`zipcode` 
        FROM (( customer LEFT JOIN customer_group ON customer.`Group_Id` = customer_group.`Group_Id`) 
        LEFT JOIN customer_address 
            ON customer.`customer_Id` = customer_address.`customer_Id` 
                AND customer_address.Address_Type = 'billing');";
        
        $data =  $model->fetchAll($this->query);
        $this->data = $data;
        return $this;
    }
}
?>