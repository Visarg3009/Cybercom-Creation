<?php
namespace Controller\Admin\Attribute;
\Mage::loadFileByClassName('Controller\Core\Admin');

class Option extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try{
            $grid = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs\Option');
            $contentHtml = $grid->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'hello',
                'element' => [
                    [
                    'selector' => '#contentHtml',
                    'html' => $contentHtml
                    ],
                ]
            ];

            header('Content-Type:application/json');
            echo json_encode($response);
            
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function formAction() {
        try {
            $form = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs\Option');
            $contentHtml = $form->toHtml();

            $tab = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs');
            $leftHtml = $tab->toHtml();
            
            $response = [
                'status' => 'success',
                'message' => 'hello',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $contentHtml
                    ],
                    [
                        'selector' => '#leftHtml',
                        'html' => $leftHtml
                    ]
                ]
            ];

            header('Content-Type:application/json');
            echo json_encode($response);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function saveAction() {
        try {
            $attribute = \Mage::getModel('Model\Attribute');

            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }

            $attributeId = $this->getRequest()->getGet('id');
            $attributeOptionExist = $this->getRequest()->getPost('exist');
            $attributeOptionNew = $this->getRequest()->getPost('new');
            
            if(!$attributeOptionExist){
                $option = \Mage::getModel('Model\Attribute\Option');
                $query = "DELETE FROM `{$option->getTableName()}` WHERE `attributeId` = '{$attributeId}';";
                $option->getAdapter()->update($query);
            }
            if($attributeOptionExist){
                $ids = '';
                foreach ($attributeOptionExist as $optionId => $value) {
                    $query = "SELECT * FROM attribute_option 
                    WHERE `attributeId` = '{$attributeId}' 
                    AND `optionId` = '{$optionId}';";
                    $option = \Mage::getModel('Model\Attribute\Option');
                    $option->fetchRow($query);
                    $option->name = $value['name'];
                    $option->sortOrder = $value['sortOrder'];
                    $option->save();
                    $ids .= $optionId.',';
                }
                $ids = '('. rtrim($ids, ',').')';
                $option = \Mage::getModel('Model\Attribute\Option');
                $query = "DELETE FROM `{$option->getTableName()}` WHERE `attributeId` = '{$attributeId}' AND `{$option->getPrimaryKey()}` NOT IN {$ids};";
                $option->getAdapter()->update($query);
            }

            if($attributeOptionNew){
                for ($i=0; $i < sizeof($attributeOptionNew['name']); $i++) {
                    $data = array_column($attributeOptionNew,$i);
                    $attributeOption = \Mage::getModel('Model\Attribute\Option');
                    $attributeOption->name = $data[0];
                    $attributeOption->sortOrder = $data[1];
                    $attributeOption->attributeId = $attributeId;
                    $attributeOption->save();
                }
            }
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}
?>