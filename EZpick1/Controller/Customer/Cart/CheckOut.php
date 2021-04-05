<?php
namespace Controller\Customer\Cart;

class CheckOut extends \Controller\Core\Customer
{
    public function checkOutAction()
    {
        $checkOut = \Mage::getBlock('Block\Customer\Cart\CheckOut')->setCart($this->getCart());
        $layout = $this->getLayout();
        $layout->addChild($checkOut,'content');
        $this->toHtmlLayout();
    }

    public function getCart($customerId = null)
    {
        // $session = \Mage::getModel('Model\Customer\Session');
        // if ($customerId) {
        //     $session->customerId = $customerId;
        // }
        if($_SESSION['customer_Id']) {
            $customer_Id = $_SESSION['customer_Id'];
        }
        $cart = \Mage::getModel('Model\Cart');
        $query = "SELECT * FROM {$cart->getTableName()} WHERE `customer_Id` = '{$customer_Id}'";

        $cart = $cart->fetchRow($query);

        if (!$cart) {
            return false;
        }
        return $cart;
    }

    public function saveBillingAction()
    { 
        try {
            $billing = $this->getRequest()->getPost('billing');
            $cartAddress = \Mage::getModel('Model\Cart\Address');
            if ($this->getCart()->getBillingAddress()) {
                $id = $this->getCart()->getBillingAddress()->cartAddressId;
                $cartAddress->load($id);
            }
            $cartAddress->setData($billing);
            $cartAddress->addressType = 'billing';
            $cartAddress->cartId = $this->getCart()->cartId;
            $cartAddress->save();
            if ($this->getRequest()->getPost('bookAddressBilling')) {
                $customerBillingAddress = $this->getCart()->getCustomer()->getBillingAddress();
                if ($customerBillingAddress) {
                    $customerBillingAddress->setData($billing);
                    $customerBillingAddress->save();
                } else {
                    $customerBillingAddress = \Mage::getModel('Model\CustomerAddress');
                    $customerBillingAddress->setData($billing);
                    $customerBillingAddress->customer_Id = $this->getCart()->getCustomer()->customer_Id;
                    $customerBillingAddress->addressType = 'billing';
                    $customerBillingAddress->save();
                }
            }
            $this->getMessage()->setSuccess('Address Saved');
            $checkOut = \Mage::getBlock('Block\Customer\Cart\CheckOut')->setCart($this->getCart());
            $content = $checkOut->toHtml();
            $response = [
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $content,
                    ]
                ]
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->checkOutAction();
    }

    public function saveShippingAction()
    {
        try {
            $flag = $this->getRequest()->getPost('sameAsBilling');
            if ($flag) {
                $billing = $this->getRequest()->getPost('billing');
                $cartAddress = \Mage::getModel('Model\Cart\Address');
                if ($this->getCart()->getShippingAddress()) {
                    $id = $this->getCart()->getShippingAddress()->cartAddressId;
                    $cartAddress->load($id);
                }
                $cartAddress->setData($billing);
                $cartAddress->addressType = 'shipping';
                $cartAddress->cartId = $this->getCart()->cartId;
                $cartAddress->save();
                if ($this->getRequest()->getPost('bookAddressShipping')) {
                    $customerShippingAddress = $this->getCart()->getCustomer()->getShippingAddress();
                    if ($customerShippingAddress) {
                        $customerShippingAddress->setData($billing);
                        $customerShippingAddress->save();
                    } else {
                        $customerShippingAddress = \Mage::getModel('Model\CustomerAddress');
                        $customerShippingAddress->setData($billing);
                        $customerShippingAddress->customer_Id = $this->getCart()->getCustomer()->customer_Id;
                        $customerShippingAddress->addressType = 'shipping';
                        $customerShippingAddress->save();
                    }
                }
            } else {
                $shipping = $this->getRequest()->getPost('shipping');
                $cartAddress = \Mage::getModel('Model\Cart\Address');
                if ($this->getCart()->getShippingAddress()) {
                    $id = $this->getCart()->getShippingAddress()->cartAddressId;
                    $cartAddress->load($id);
                }
                $cartAddress->setData($shipping);
                $cartAddress->addressType = 'shipping';
                $cartAddress->cartId = $this->getCart()->cartId;
                $cartAddress->save();

                if ($this->getRequest()->getPost('bookAddressShipping')) {
                    $customerShippingAddress = $this->getCart()->getCustomer()->getShippingAddress();
                    if ($customerShippingAddress) {
                        $customerShippingAddress->setData($shipping);
                        $customerShippingAddress->save();
                    } else {
                        $customerShippingAddress = \Mage::getModel('Model\CustomerAddress');
                        $customerShippingAddress->setData($shipping);
                        $customerShippingAddress->customer_Id = $this->getCart()->getCustomer()->customer_Id;
                        $customerShippingAddress->addressType = 'shipping';
                        $customerShippingAddress->save();
                    }
                }
            }
            $this->getMessage()->setSuccess('Address Saved');
            $checkOut = \Mage::getBlock('Block\Customer\Cart\CheckOut')->setCart($this->getCart());
            $content = $checkOut->toHtml();
            $response = [
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $content,
                    ]
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->checkOutAction();
    }

    public function savePaymentMethodAction()
    {
        try {
            $payment = $this->getRequest()->getPost('paymentMethod');
            if ($payment) {
                $cart = $this->getCart();
                $cart->paymentMethodId = $payment;
                $cart->save();
            }
            $this->getMessage()->setSuccess('Payment method saved.');
            $checkOut = \Mage::getBlock('Block\Customer\Cart\CheckOut')->setCart($this->getCart());
            $content = $checkOut->toHtml();
            $response = [
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $content,
                    ]
                ]
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->checkOutAction();
    }

    public function saveShippingMethodAction()
    {
        try {
            $shipment = $this->getRequest()->getPost('shippingMethod');
            if ($shipment) {
                $cart = $this->getCart();
                $cart->shipmentMethodId = $shipment;
                $cart->save();
            }
            $this->getMessage()->setSuccess('Shipping method saved.');
            $checkOut = \Mage::getBlock('Block\Customer\Cart\CheckOut')->setCart($this->getCart());
            $content = $checkOut->toHtml();
            $response = [
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $content,
                    ]
                ]
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->checkOutAction();
    }
}