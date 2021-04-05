<?php
namespace Controller\Admin;
\Mage::getController('Controller\Core\Admin');

class Attribute extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try{
            $grid = \Mage::getBlock('Block\Admin\Attribute\Grid');
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
            
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function formAction() {
        try {
            $form = \Mage::getBlock('Block\Admin\Attribute\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $attribute = \Mage::getModel('Model\Attribute');
            if ($id) {    
                $attribute = $attribute->load($id);
                if (!$attribute) {
                    throw new \Exception("No attribute Found!");
                }
            }
            $form->setTableRow($attribute);
            $contentHtml = $form->toHtml();

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
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function saveAction() {
        try {
            $attribute = \Mage::getModel('Model\Attribute');
            
            if (!$this->getRequest()->isPost()) {
                throw new Exception("invalid Request");
            }
            $attributeId = $this->getRequest()->getGet('id');
            $attributeData = $this->getRequest()->getPost('attribute');
            
            if ($attributeId) {
                $attribute->attributeId = $attributeId;
            }

            $attribute->setData($attributeData);
        
            if ($attribute->save()) {
                $this->getMessage()->setSuccess('Record Successfully Saved');
            } else {
                $this->getMessage()->setFailure('Unable To Save Record');
            }
            $query = "ALTER TABLE `{$attribute->entityTypeId}` ADD `{$attribute->code}` {$attribute->backendType}(45);";
            $attribute->getAdapter()->update($query);

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction() {
        try {
            $attribute = \Mage::getModel('Model\Attribute');
            $attributeId = (int) $this->getRequest()->getGet('id');

            if (!$attributeId) {
                throw new Exception("Id is required");
            }

            if ($attributeId) {
                $attribute =  $attribute->load($attributeId); 
                if(!$attribute){
                 throw new Exception("Unable to Load data.");
                }
            }

            $query = "ALTER TABLE `{$attribute->entityTypeId}` DROP COLUMN `{$attribute->code}`;";
            $attribute->getAdapter()->update($query);
            
            if ($attribute->delete($attributeId)) {
                $this->getMessage()->setSuccess('Record Successfully Deleted!!');
            } else {
                $this->getMessage()->setFailure('Unable To Delete Record.');
            }
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}
?>