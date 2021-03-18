<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::getModel('Model\Core\Adapter');

class Category extends \Model\Core\Table{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    function __CONSTRUCT()
    {
        $this->setTableName('category');
        $this->setPrimaryKey('category_Id');
    }

    public function getStatusOption()
    {
        return [
            self::STATUS_ENABLED => 'Enable',
            self::STATUS_DISABLED => 'Disable', 
        ];
    }

    public function updatePathId()
    {
        if (!$this->parent_Id) {
            $path = $this->category_Id;
        } else {
            $parent = \Mage::getModel('Model\Category')->load($this->parent_Id);
            if (!$parent) {
                throw new Exception("Unable to load parent", 1);
            }
            $path = $parent->path . '=' . $this->category_Id;
        }
        $this->path = $path;
        return $this->save();
    }

    public function updateChildrenPathIds($categoryPathId, $Id = null, $parent_Id = null)
    {
        $categoryPathId = $categoryPathId . '=';
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `path` LIKE '{$categoryPathId}%' ORDER BY `path` ASC";
        $categories = $this->fetchAll($query);
        if ($categories) {
            foreach ($categories->getData() as  $row) {
                if ($parent_Id != null) {
                    if ($row->parent_Id == $Id) {
                        $row->parent_Id = $parent_Id;
                    }
                }
                $row->updatePathId();
            }
        }
    }
}

?>