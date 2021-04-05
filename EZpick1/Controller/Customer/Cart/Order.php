<?php
namespace Controller\Customer\Cart;

class Order extends \Controller\Core\Customer
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $order = \Mage::getBlock('Block\Customer\Order');
        $layout->addChild($order,'content');
        $this->toHtmlLayout();
    }

    public function placeOrderAction()
    {
        $this->saveOrder();
        $this->saveOrderItem();
        $this->saveOrderAddresses();
        $this->deleteCart();
        $this->indexAction();
    }

    public function getCart()
    {
        $cartId = $this->getRequest()->getGet('id');
        $cart = \Mage::getModel('Model\Cart');
        if ($cartId) {    
            $cart = $cart->load($cartId);
            if (!$cart) {
                throw new \Exception("No Cart Found!");
            }
        }
        if (!$cart) {
            return false;
        }
        return $cart;
    }

    public function saveOrder()
    {
        $cart = $this->getCart();
        $customer = $this->getCart()->getCustomer();
        $paymentMethod = $this->getCart()->getPaymentMethod();
        $shippingMethod = $this->getCart()->getShippingMethod();
        $order = \Mage::getModel('Model\Order');
    
        $order->cartId = $cart->cartId;
        $order->customer_Id = $cart->customer_Id;
        $order->customerName = $customer->customerName;
        $order->email = $customer->email;
        $order->mobile = $customer->mobile;
        $order->paymentMethodId = $paymentMethod->method_Id;
        $order->paymentMethodName = $paymentMethod->name;
        $order->shippingMethodId = $shippingMethod->method_Id;
        $order->shippingMethodName = $shippingMethod->name;
        $order->shippingMethodCode = $shippingMethod->code;
        $order->shippingCharges = $shippingMethod->amount;
        $order->shippingAmount = $cart->shippingAmount;
        $order->save();
    }

    public function saveOrderItem()
    {
        $cartItems = $this->getCart()->getItems();
        
        foreach ($cartItems->getData() as $key => $cartItem) {
            $orderItem = \Mage::getModel('Model\Order\Item');
            $product = $orderItem->getProduct($cartItem->productId);

            $order = \Mage::getModel('Model\Order');
            $query = "SELECT `orderId` FROM `order` WHERE `cartId` = '{$cartItem->cartId}'";
            $order = $order->fetchRow($query);

            $orderItem->orderId = $order->orderId;
            $orderItem->productId = $cartItem->productId;
            $orderItem->sku = $product->sku;
            $orderItem->name = $product->name;
            $orderItem->basePrice = $cartItem->basePrice;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->basePrice * $cartItem->quantity;
            $orderItem->discount = $cartItem->discount * $cartItem->quantity;
            $orderItem->total = ($cartItem->quantity * $cartItem->basePrice)- ($cartItem->quantity * $cartItem->discount);
            $orderItem->save();
        }
    }

    public function saveOrderAddresses()
    {
        $cartAddresses = $this->getCart()->getAddresses();

        foreach ($cartAddresses->getData() as $key => $cartAddress) {
            $orderAddress = \Mage::getModel('Model\Order\Address');

            $order = \Mage::getModel('Model\Order');
            $query = "SELECT `orderId` FROM `order` WHERE `cartId` = '{$cartAddress->cartId}'";
            $order = $order->fetchRow($query);

            $orderAddress->orderId = $order->orderId;
            $orderAddress->addressId = $cartAddress->cartAddressId;
            $orderAddress->addressType = $cartAddress->addressType;
            $orderAddress->address = $cartAddress->address;
            $orderAddress->city = $cartAddress->city;
            $orderAddress->state = $cartAddress->state;
            $orderAddress->country = $cartAddress->country;
            $orderAddress->zipcode = $cartAddress->zipcode;
            $orderAddress->save();
        }
    }

    public function deleteCart()
    {
        $cart = $this->getCart();

        $cartItems = $this->getCart()->getItems();
        foreach ($cartItems->getData() as $key => $cartItem) {
            $item = \Mage::getModel('Model\Cart\Item');
            $item->delete($cartItem->cartItemId);
        }

        $cartAddresses = $this->getCart()->getAddresses();
        foreach ($cartAddresses->getData() as $key => $cartAddress) {
            $address = \Mage::getModel('Model\Cart\Address');
            $address->delete($cartAddress->cartAddressId);
        }
        $cart->delete($cart->cartId);
    }
}