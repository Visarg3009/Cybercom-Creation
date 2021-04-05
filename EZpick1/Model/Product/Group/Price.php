<?php
namespace Model\Porduct\Group;
\Mage::getModel('Model\Core\Table');

class Price extends \Model\Core\Table
{
    function __CONSTRUCT()
    {
        $this->setTableName('product_group_price');
        $this->setPrimaryKey('entityId');
    }
}
?>