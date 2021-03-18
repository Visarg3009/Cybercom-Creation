<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::getModel('Model\Core\Adapter');

class ProductMedia extends \Model\Core\Table{

    function __CONSTRUCT()
    {
        $this->setTableName('product_media');
        $this->setPrimaryKey('image_Id');
    }

    public function getImagePath()
    {
        return \Mage::getBaseDir('Images\Product\\');
    }
}
?>