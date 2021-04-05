<?php
namespace Model;

class Cart extends Core\Table
{
    protected $customer = null;
    protected $items = null;
    protected $billingAddress = null;
    protected $shippingAddress = null;
    protected $paymentMethod = null;
    protected $shippingMethod = null;
    protected $addresses = null;

    public function __construct()
    {
        $this->setTableName('cart');
        $this->setPrimaryKey('cartId');
    }

    public function setCustomer(\Model\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getCustomer()
    {
        if ($this->customer) {
            return $this->customer;
        }
        if (!$this->customer_Id) {
            return false;
        }
        $customer = \Mage::getModel('Model\Customer')->load($this->customer_Id);
        $this->setCustomer($customer);
        return $this->customer;
    }

    public function setItems(\Model\Cart\Item\Collection $items)
    {
        $this->items = $items;
        return $this;
    }

    public function getItems()
    {
        if ($this->items) {
            return $this->items;
        }
        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * FROM cart_item WHERE `cartId` = '{$this->cartId}';";
        $items = \Mage::getModel('Model\Cart\Item')->fetchAll($query);
        if($items) {
            $this->setItems($items);
        }
        return $this->items;
    }

    public function setBillingAddress(\Model\Cart\Address $address)
    {
        $this->billingAddress = $address;
        return $this;
    }

    public function getBillingAddress()
    {
        if ($this->billingAddress) {
            return $this->billingAddress;
        }
        if (!$this->cartId) {
            return false;
        }
        $billingAddress = \Mage::getModel('Model\Cart\Address');
        $query = "SELECT * FROM {$billingAddress->getTableName()} WHERE `cartId` = '{$this->cartId}' AND `addressType` = 'billing';";
        $billingAddress->fetchRow($query);
        $this->setBillingAddress($billingAddress);
        return $this->billingAddress;
    }

    public function setShippingAddress(\Model\Cart\Address $address)
    {
        $this->shippingAddress = $address;
        return $this;
    }

    public function getShippingAddress()
    {
        if ($this->shippingAddress) {
            return $this->shippingAddress;
        }
        if (!$this->cartId) {
            return false;
        }
        $shippingAddress = \Mage::getModel('Model\Cart\Address');
        $query = "SELECT * FROM {$shippingAddress->getTableName()} WHERE `cartId` = '{$this->cartId}' AND `addressType` = 'shipping';";
        $shippingAddress->fetchRow($query);
        $this->setShippingAddress($shippingAddress);
       
        return $this->shippingAddress;
    }

    public function setPaymentMethod(\Model\Payment $payment)
    {
        $this->paymentMethod = $payment;
        return $this;
    }

    public function getPaymentMethod()
    {
        if (!$this->paymentMethodId) {
            return false;
        }
        $payment = \Mage::getModel('Model\Payment')->load($this->paymentMethodId);
        $this->setPaymentMethod($payment);
        return $this->paymentMethod;
    }

    public function setShippingMethod(\Model\Shipment $shipping)
    {
        $this->shippingMethod = $shipping;
        return $this;
    }

    public function getShippingMethod()
    {
        if (!$this->shipmentMethodId) {
            return false;
        }
        $shipping = \Mage::getModel('Model\Shipment')->load($this->shipmentMethodId);
        $this->setShippingMethod($shipping);
        return $this->shippingMethod;
    }

    public function addItemToCart(\Model\Product $product, $quantity = 1)
    {
        $item = \Mage::getModel('Model\Cart\Item');
        $query = "SELECT * FROM `{$item->getTableName()}` WHERE `cartId` = {$this->cartId} AND productId = '{$product->product_id}'";
        $item = $item->fetchRow($query);
        if ($item) {
            $item->quantity += $quantity;
            $item->save();
            return true;
        }

        $item = \Mage::getModel('Model\Cart\Item');
        $item->cartId = $this->cartId;
        $item->productId = $product->product_id;
        $item->basePrice = $product->price;
        $item->price = $product->price;
        $item->quantity = $quantity;
        $item->discount = $product->discount;
        $item->created_Date = date("Y-m-d H:i:s");
        $item->save();
    }

    public function setAddresses(\Model\Cart\Address\Collection $addresses)
    {
        $this->addresses = $addresses;
        return $this;
    }

    public function getAddresses()
    {
        if (!$this->cartId) {
            return false;
        }
        $query = "SELECT * FROM cart_address WHERE `cartId` = '{$this->cartId}';";
        $addresses = \Mage::getModel('Model\Cart\Address')->fetchAll($query);
        if($addresses) {
            $this->setAddresses($addresses);
        }
        return $this->addresses;
    }
}