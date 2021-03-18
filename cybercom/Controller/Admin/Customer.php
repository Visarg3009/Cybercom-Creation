<?php
namespace Controller\Admin;
\Mage::getController('Controller\Core\Admin');

class Customer extends \Controller\Core\Admin
{
    protected $customers = [];
    protected $customer_addresses = [];

    public function getCustomers() {
        return $this->customers;
    }
    
    public function setCustomers($customers) {
        $this->customers = $customers;
        return $this;
    }

    public function getCustomerAddresses() {
        return $this->customer_addresses;
    }
    
    public function setCustomerAddresses($customer_addresses) {
        $this->customer_addresses = $customer_addresses;
        return $this;
    }

    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try {
            $grid = \Mage::getBlock('Block\Admin\Customer\Grid');
            $contentHtml = $grid->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'hello',
                'element' => [
                    [
                    'selector' => '#contentHtml',
                    'html' => $contentHtml
                    ],
                ]
            ];

            header('Content-Type:application/json');
            echo json_encode($response);

        }  catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function formAction()
    {
        try {
            $form = \Mage::getBlock('Block\Admin\Customer\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $customer = \Mage::getModel('Model\Customer');
            if ($id) {    
                $customer = $customer->load($id);
                if (!$customer) {
                    throw new Exception("No customer Found!");
                }
            }
            $form->setTableRow($customer);
            $contentHtml = $form->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'hello',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $contentHtml
                    ],
                ]
            ];

            header('Content-Type:application/json');
            echo json_encode($response);

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function saveAction() {
        try {
            $tab = $this->getRequest()->getGet('tab');
    
            if ($tab == 'address') {
                $customer_address = \Mage::getModel('Model\CustomerAddress');
                
                if (!$this->getRequest()->isPost()) {
                    throw new Exception("invalid Request");
                }
               
                $billingData = $this->getRequest()->getPost('billing');
                $shippingData = $this->getRequest()->getPost('shipping');
                
                if ($customer_Id = $this->getRequest()->getGet('id')) {
                    if (!$customer_address->load($customer_Id)) {
                        $billingData['customer_Id'] = $customer_Id;
                        $billingData['Address_Type'] = 'billing';
                        $customer_address->setData($billingData);
                        $customer_address->saveAddress('insert');

                        $shippingData['customer_Id'] = $customer_Id;
                        $shippingData['Address_Type'] = 'shipping';
                        $customer_address->setData($shippingData);
                        $customer_address->saveAddress('insert');
                    } else {
                        $billingData['Address_Type'] = 'billing';
                        $customer_address->setData($billingData);
                        $customer_address->saveAddress('update');

                        $shippingData['Address_Type'] = 'shipping';
                        $customer_address->setData($shippingData);
                        $customer_address->saveAddress('update');
                    }
                }

            } else {

                $customer = \Mage::getModel('Model\Customer');
                
                if (!$this->getRequest()->isPost()) {
                    throw new Exception("invalid Request");
                }
                $customer_Id = $this->getRequest()->getGet('id');
                $customerData = $this->getRequest()->getPost('customer');
                
                if ($customer_Id) {
                    $customer->customer_Id = $customer_Id;
                    $customer->updated_Date = Date("Y-m-d H:i:s");
                } else {
                    $customer->created_Date = Date("Y-m-d H:i:s");
                }
                
                $customer->setData($customerData);

                $customer->save();
            }

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
    
    public function deleteAction() {
        try {
            $customer = \Mage::getModel('Model\Customer');
            $customer_Id = (int) $this->getRequest()->getGet('id');

            if (!$customer_Id) {
                throw new Exception("Id is required");
            }
            
            if ($customer_Id) {
                $customer =  $customer->load($customer_Id); 
                if(!$customer){
                 throw new Exception("Unable to Load data.");
                }
            }
            $customer->delete($customer_Id);
            
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}
?>