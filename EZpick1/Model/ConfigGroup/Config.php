<?php
namespace Model\ConfigGroup;

class Config extends \Model\Core\Table
{
    function __CONSTRUCT()
    {
        $this->setTableName('config');
        $this->setPrimaryKey('configId');
    }
}