<?php
namespace Block\Admin\Payment;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $data = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/payment/grid.php');
    }

    public function getPayments()
    {
        if (!$this->data) {
            $this->setPayments();
        }
       return $this->data;
    }

    public function setPayments()
    {
        $model = \Mage::getModel('Model\Payment');
        $data =  $model->fetchAll($this->query);
        $this->data = $data;
        return $this;
    }
}
?>