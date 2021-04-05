<?php
namespace Block\Admin\Attribute;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $attributes = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/attribute/grid.php');
    }

    public function getAttributes()
    {
        if (!$this->attributes) {
            $this->setAttributes();
        }
       return $this->attributes;
    }

    public function setAttributes()
    {
        $model = \Mage::getModel('Model\Attribute');
        $attributes =  $model->fetchAll($this->query);
        $this->attributes = $attributes;
        return $this;
    }
}
?>