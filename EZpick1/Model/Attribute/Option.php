<?php
namespace Model\Attribute;
\Mage::loadFileByClassName('Model\Core\Table');

class Option extends \Model\Core\Table
{
    function __CONSTRUCT()
    {
        $this->setTableName('attribute_option');
        $this->setPrimaryKey('optionId');
    }
}
?>