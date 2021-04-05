<?php
namespace Model;

class CustomerAddress extends \Model\Core\Table
{
    function __CONSTRUCT()
    {
        $this->setTableName('customer_address');
        $this->setPrimaryKey('addressId');
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
                if ($key != 'addressType' && $key != "{$this->getPrimaryKey()}") {
                    $param.= "`{$key}` = '{$value}',";
                }
            }
    
            $param = rtrim($param,",");
            $query = "UPDATE `{$this->getTableName()}` SET {$param} WHERE `{$this->getTableName()}`.`{$this->getPrimaryKey()}`={$this->data[$this->getPrimaryKey()]} AND 'addressType' = '{$this->data['addressType']}';";

            $id = $this->getAdapter()->update($query);
            return $id;
        }
    }

    public function getAddress($addressType,$customerId)
    {
        $query = "SELECT * FROM {$this->getTableName()} WHERE `addressType` = '{$addressType}' AND `customer_Id` = '{$customerId}';";
        
        $this->fetchRow($query);
        return $this;
    }
}