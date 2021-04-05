<?php
namespace Block\Admin\Product\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class GroupPrice extends \Block\Core\Edit
{
    protected $product = null;
    protected $customerGroups = null;

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/product/edit/tabs/groupPrice.php');
    }

    public function getProduct()
    {
        if (!$this->product) {
            $this->setProduct();
        }
       return $this->product;
    }

    public function setProduct(\Model\Product $product = null)
    {
        if (!$product) {
            $product = \Mage::getModel('Model\Product');
        }

        if ($productId = $this->getRequest()->getGet('id')) {
            $product = $product->load($productId);
        }
        $this->product = $product;
        return $this;
    }

    public function getCustomerGroups()
    {
        if (!$this->customerGroups) {
            $this->setCustomerGroups();
        }
       return $this->customerGroups;
    }

    public function setCustomerGroups(\Model\CustomerGroup $customerGroups = null)
    {
        $productId = $this->getProduct()->product_id;
        $customerGroup = \Mage::getModel('Model\CustomerGroup');
        $query = "SELECT cg.*,pgp.productId,pgp.entityId,pgp.price as groupPrice,
        if(p.price IS NULL,'{$this->getProduct()->price}',p.price) as price
        FROM customer_group as cg
        LEFT JOIN product_group_price as pgp
            ON pgp.customerGroupId = cg.Group_ID
                AND pgp.productId = '{$productId}'
        LEFT JOIN product p
            ON pgp.productId = p.product_id";

        $customerGroups = $customerGroup->fetchAll($query);
        $this->customerGroups = $customerGroups;
        return $this;
    }
}
?>