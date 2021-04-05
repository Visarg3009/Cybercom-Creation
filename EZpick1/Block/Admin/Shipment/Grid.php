<?php
namespace Block\Admin\Shipment;

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $data = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/shipment/grid.php');
    }

    public function getShipments()
    {
        if (!$this->data) {
            $this->setShipments();
        }
       return $this->data;
    }

    public function setShipments()
    {
        $model = \Mage::getModel('Model\Shipment');
        $data =  $model->fetchAll($this->query);
        $this->data = $data;
        return $this;
    }
}