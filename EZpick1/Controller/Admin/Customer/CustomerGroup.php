<?php
namespace Controller\Admin\Customer;
\Mage::getController('Controller\Core\Admin');

class CustomerGroup extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try {
            $grid = \Mage::getBlock('Block\Admin\CustomerGroup\Grid');
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
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function formAction()
    {
        try {
            $form = \Mage::getBlock('Block\Admin\CustomerGroup\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $customerGroup = \Mage::getModel('Model\CustomerGroup');
            if ($id) {    
                $customerGroup = $customerGroup->load($id);
                if (!$customerGroup) {
                    throw new \Exception("No CustomerGroup Found!");
                }
            }
            $form->setTableRow($customerGroup);
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
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function saveAction() {
        try {
            $customerGroup = \Mage::getModel('Model\CustomerGroup');
            
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }
            $Group_ID = $this->getRequest()->getGet('id');
            $customerGroupData = $this->getRequest()->getPost('customerGroup');
            
            if ($Group_ID) {
                $customerGroup->Group_ID = $Group_ID;
            }
             else {
               $customerGroup->created_Date = Date("Y-m-d H:i:s");
            }
            $customerGroup->setData($customerGroupData);

            if ($customerGroup->save()) {
                $this->getMessage()->setSuccess('Record Successfully Saved');
            } else {
                $this->getMessage()->setFailure('Unable To Save Record');
            }
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction() {
        try {
            $customerGroup = \Mage::getModel('Model\CustomerGroup');
            $Group_ID = (int) $this->getRequest()->getGet('id');

            if (!$Group_ID) {
                throw new \Exception("Id is required");
            }
            if ($Group_ID) {
                $customerGroup =  $customerGroup->load($Group_ID); 
                if(!$customerGroup){
                 throw new \Exception("Unable to Load data.");
                }
            }
            
            if ($customerGroup->delete($Group_ID)) {
                $this->getMessage()->setSuccess('Record Successfully Deleted!!');
            } else {
                $this->getMessage()->setFailure('Unable To Delete Record.');
            }
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}
?>