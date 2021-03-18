<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');
\Mage::getModel('Model\Core\Adapter');

class CustomerAddress extends \Model\Core\Table{

    function __CONSTRUCT()
    {
        $this->setTableName('customer_address');
        $this->setPrimaryKey('customer_Id');
    }

    public function saveAddress($action = null)
    {
        if ($action == 'insert') {
            $query = "INSERT INTO `{$this->getTableName()}` (`".implode('`, `', array_keys($this->data))."`)  VALUES ('".implode('\',\'', array_values($this->data))."');";
            
            $id = $this->getAdapter()->insert($query);
            $this->load($id);
        }

        if ($action == 'update') {
            $param = NULL;
            foreach ($this->data as $key => $value) {
                if ($key != 'Address_Type' && $key != "{$this->getPrimaryKey()}") {
                    $param.= "`{$key}` = '{$value}',";
                }
            }
    
            $param = rtrim($param,",");
            $query = "UPDATE `{$this->getTableName()}` SET {$param} WHERE `{$this->getTableName()}`.`{$this->getPrimaryKey()}`={$this->data[$this->getPrimaryKey()]} AND 'Address_Type' = '{$this->data['Address_Type']}';";

            $id = $this->getAdapter()->update($query);
            return $id;
        }
    }

    public function getAddress($addresType,$customerId)
    {
        $query = "SELECT * FROM {$this->getTableName()} WHERE `Address_Type` = '{$addresType}' AND `customer_Id` = '{$customerId}';";
        
        $this->fetchRow($query);
        return $this;
    }
}
?>