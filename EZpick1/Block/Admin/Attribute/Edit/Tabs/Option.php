<?php
namespace Block\Admin\Attribute\Edit\Tabs;
\Mage::loadFileByClassName('Block\Core\Edit');

class Option extends \Block\Core\Edit
{
    public $attributeOptions = [];
    public $query = null;

    public function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/attribute/edit/tabs/option.php');
    }

    public function getAttributeOptions()
    {
        if (!$this->attributeOptions) {
            $this->setAttributeOptions();
        }
       return $this->attributeOptions;
    }

    public function setAttributeOptions()
    {
        $option = \Mage::getModel('Model\Attribute\Option');
        $attributeId = $this->getTableRow()->attributeId;
        $query = "SELECT * FROM attribute_option WHERE attributeId = {$attributeId};";
        $attributeOptions =  $option->fetchAll($query);
        $this->attributeOptions = $attributeOptions;
        return $this;
    }
}
?>