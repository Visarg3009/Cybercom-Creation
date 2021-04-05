<?php
namespace Model;
\Mage::loadFileByClassName('Model\Core\Table');

class Attribute extends \Model\Core\Table{
    const BACKEND_TYPE_VARCHAR = 'varchar';
    const BACKEND_TYPE_INT = 'int';
    const BACKEND_TYPE_DECIMAL = 'decimal';
    const BACKEND_TYPE_TEXT = 'text';

    const INPUT_TYPE_TEXT = 'text';
    const INPUT_TYPE_TEXTAREA = 'textarea';
    const INPUT_TYPE_SELECT = 'select';
    const INPUT_TYPE_RADIO = 'radio';
    const INPUT_TYPE_CHECKBOX = 'checkbox';

    const ENTITY_TYPE_PRODUCT = 'product';
    const ENTITY_TYPE_CATEGORY = 'category';

    function __CONSTRUCT()
    {
        $this->setTableName('attribute');
        $this->setPrimaryKey('attributeId');
    }

    public function getBackendTypeOptions()
    {
        return [
            self::BACKEND_TYPE_VARCHAR => 'varchar',
            self::BACKEND_TYPE_INT => 'int',
            self::BACKEND_TYPE_DECIMAL => 'decimal',
            self::BACKEND_TYPE_TEXT => 'text',
        ];
    }

    public function getInputTypeOptions()
    {
        return [
            self::INPUT_TYPE_TEXT => 'text',
            self::INPUT_TYPE_TEXTAREA => 'textarea',
            self::INPUT_TYPE_SELECT => 'select',
            self::INPUT_TYPE_RADIO => 'radio',
            self::INPUT_TYPE_CHECKBOX => 'checkbox',
        ];
    }

    public function getEntityTypeIdOptions()
    {
        return [
            self::ENTITY_TYPE_PRODUCT => 'product',
            self::ENTITY_TYPE_CATEGORY => 'category',
        ];
    }
}
?>