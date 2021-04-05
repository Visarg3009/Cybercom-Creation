<?php
namespace Model\Core;

class Table
{
    protected $primaryKey = NULL;
    protected $tableName = NULL;
    protected $data = [];
    public $adapter = NULL;

    public function getPrimaryKey()
    {
        if (!$this->primaryKey) {
            $this->setPrimaryKey($this->primaryKey);
        }
        return $this->primaryKey;
    }

    public function setPrimaryKey($primaryKey)
    {   
        $this->primaryKey = $primaryKey;
        return $this;
    }

    public function getTableName()
    {
        if (!$this->tableName) {
            $this->setTableName($this->tableName);
        }
        return $this->tableName;
    }

    public function setTableName($tableName)
    {
        if (!$tableName) {
            $tableName = $tableName;
        }
        $this->tableName = $tableName;
        return $this;
    }

    public function __SET($key,$value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function __GET($key)
    {
        if (!array_key_exists($key,$this->data)) {
            return false;
        }
        return $this->data[$key];
    }

    public function setAdapter($adapter = NULL)
    {
        if (!$adapter) {
            $adapter = \Mage::getModel('Model\Core\Adapter');
        }
        $this->adapter = $adapter;
        return $this;
    }

    public function getAdapter()
    {
        if (!$this->adapter) {
            $this->setAdapter();
        }
        return $this->adapter;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data = array_merge($this->data,$data);
        return $this;
    }

    public function resetData()
    {
        $this->data = [];
        return $this;
    }

    public function fetchAll($query)
    {
        if (!$query) {
            $query = "SELECT * FROM `{$this->getTableName()}`";
        }

        $rows = $this->getAdapter()->fetchAll($query);
        
        if (!$rows) {
                return false;
        }
        foreach ($rows as $row => &$value) {
            $row = new $this;
            $value = $row->setData($value);
        }
        $collectionClassName = get_class($this).'\Collection';
        $collection = \Mage::getModel($collectionClassName);
        $collection->setData($rows);
        return $collection;
        //return $rows;
    }

    public function fetchRow($query)
    {
        if (!$query) {
            $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}`= {$value}";
        }
        $row = $this->getAdapter()->fetchRow($query);
        if (!$row) {
            return false;
        }
        $this->setData($row);
        return $this;
    }

    public function load($value)
    {
        $value = (int)$value;
        $query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = {$value}";
        
        $row = $this->getAdapter()->fetchRow($query);
        
        if (!$row) {
            return false;
        }
        $this->setData($row);
        return $this;
    }

    public function save()
    {  
        $id = (int) $this->{$this->getPrimaryKey()};
        if (!$id) {
            $query = "INSERT INTO `{$this->getTableName()}` (`".implode('`, `', array_keys($this->data))."`)  VALUES ('".implode('\',\'', array_values($this->data))."');";
            $id = $this->getAdapter()->insert($query);
            $this->load($id);
            return $this;
        }

        $param = NULL;
        foreach ($this->data as $key => $value) {
            $param.= "`{$key}` = '{$value}',";
        }

        $param = rtrim($param,",");
        $query = "UPDATE `{$this->getTableName()}` SET {$param} WHERE `{$this->getTableName()}`.`{$this->getPrimaryKey()}`={$this->data[$this->getPrimaryKey()]}";
   
        $id = $this->getAdapter()->update($query);
        return $id;
    }

    public function delete($id)
    {
        $id = (int)$id;

        $query = "DELETE FROM `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = $id";
        
        $this->getAdapter()->delete($query);
        return true;
    }
}
?>