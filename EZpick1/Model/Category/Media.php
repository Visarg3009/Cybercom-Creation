<?php
namespace Model\Category;
\Mage::loadFileByClassName('Model\Core\Table');

class Media extends \Model\Core\Table{

    function __CONSTRUCT()
    {
        $this->setTableName('category_media');
        $this->setPrimaryKey('image_Id');
    }

    public function getImagePath()
    {
        return \Mage::getBaseDir('Images\Category\\');
    }
}