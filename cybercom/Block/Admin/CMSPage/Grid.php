<?php
namespace Block\Admin\CMSPage;
\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    public $query = NULL;
    public $data = [];

    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
        $this->setTemplate('./View/admin/cmsPage/grid.php');
    }

    public function getCMSPages()
    {
        if (!$this->data) {
            $this->setCMSPages();
        }
       return $this->data;
    }

    public function setCMSPages()
    {
        $model = \Mage::getModel('Model\CMSPage');
        $data =  $model->fetchAll($this->query);
        $this->data = $data;
        return $this;
    }
}
?>