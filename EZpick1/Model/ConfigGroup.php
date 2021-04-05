<?php
namespace Model;

class ConfigGroup extends Core\Table
{
    function __CONSTRUCT()
    {
        $this->setTableName('config_group');
        $this->setPrimaryKey('groupId');
    }
}