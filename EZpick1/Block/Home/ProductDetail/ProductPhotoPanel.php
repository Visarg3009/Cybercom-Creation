<?php
namespace Block\Home\ProductDetail;

class ProductPhotoPanel extends \Block\Core\Template
{
    protected $images = [];
    protected $image = null;

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/home/productDetail/productPhotoPanel.php');
    }

    public function getThumbnailPhoto($id)
    {
        $productImage = \Mage::getModel('Model\Product');
        $query = "SELECT product.*, product_media.image_name
        FROM product
        LEFT JOIN product_media ON product.product_id = product_media.product_id
        WHERE product.product_id = '{$id}'";
        $productImage->fetchRow($query);
        $this->image = $productImage;
        return $this->image;
    }

    public function getPhotos($id)
    {
        $productImages = \Mage::getModel('Model\Product');
        $query = "SELECT product.*, product_media.image_name
        FROM product
        LEFT JOIN product_media ON product.product_id = product_media.product_id
        WHERE product.product_id = '{$id}'";
        $productImages->fetchAll($query);
        $this->images= $productImages;
        return $this->image;
    }
}