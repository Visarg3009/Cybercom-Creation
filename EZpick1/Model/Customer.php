<?php
namespace Model;

class Customer extends Core\Table
{
    protected $billingAddress = null;
    protected $shippingAddress = null;

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    function __CONSTRUCT()
    {
        $this->setTableName('customer');
        $this->setPrimaryKey('customer_Id');
    }

    public function getStatusOption()
    {
        return [
            self::STATUS_DISABLED => 'Disable',
            self::STATUS_ENABLED => 'Enable',
        ];
    }

    public function setBillingAddress()
    {
        $address = \Mage::getModel('Model\CustomerAddress');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `customer_Id` = '{$this->customer_Id}' AND `addressType` = 'billing'";
        $address = $address->fetchRow($query);
        $this->billingAddress = $address;
        return $this;
    }

    public function getBillingAddress()
    {
        if (!$this->billingAddress) {
            $this->setBillingAddress();
        }
        return $this->billingAddress;
    }

    public function setShippingAddress()
    {
        $address = \Mage::getModel('Model\CustomerAddress');
        $query = "SELECT * FROM `{$address->getTableName()}` WHERE `customer_Id` = '{$this->customer_Id}' AND `addressType` = 'shipping'";
        $address = $address->fetchRow($query);
        $this->shippingAddress = $address;
        return $this;
    }

    public function getShippingAddress()
    {
        if (!$this->shippingAddress) {
            $this->setShippingAddress();
        }
        return $this->shippingAddress;
    }
}