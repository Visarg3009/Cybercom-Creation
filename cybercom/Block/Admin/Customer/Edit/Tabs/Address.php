<?php
namespace Block\Admin\Customer\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Address extends \Block\Core\Edit
{
    public $customerAddress = null;
    protected $address = [];

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/customer/edit/tabs/address.php');
    }

    public function getCustomerAddress()
    {
        if (!$this->customerAddress) {
            $this->setCustomerAddress();
        }
       return $this->customerAddress;
    }

    public function setCustomerAddress($customerAddress = null)
    {   
        $request = \Mage::getModel('Model\Core\Request');
        if (!$customerAddress) {
            $customerAddress = \Mage::getModel('Model\CustomerAddress');
        }
        if ($id = (int) $request->getGet('id')) 
        {    
            $customerAddress = $customerAddress->load($id);  
        }
        $this->customerAddress = $customerAddress;
        return $this;
    }

    public function validCustomer()
    {
        $customer_id = $this->getRequest()->getGet('id');
        if (!$customer = \Mage::getModel('Model\Customer')->load($customer_id)) {
            return false;
        }
        return true;
    }

    public function getAddresses()
    {
        if ($customer_id = $this->getRequest()->getGet('id')) {
            $this->address[] = \Mage::getModel('Model\CustomerAddress')->getAddress('billing',$customer_id);
            $this->address[] = \Mage::getModel('Model\CustomerAddress')->getAddress('shipping',$customer_id);
            return $this->address;
        }
    }

    public function getTitle()
    {
        return 'CustomerAddress Add/Edit';
    }
}
?>