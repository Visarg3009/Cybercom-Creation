<?php
namespace Controller\Admin;
\Mage::getController('Controller\Core\Admin');

class Admin extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try {
            $grid = \Mage::getBlock('Block\Admin\Admin\Grid');
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

    public function formAction()
    {
        try {
            $form = \Mage::getBlock('Block\Admin\Admin\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $admin = \Mage::getModel('Model\Admin');
            if ($id) {    
                $admin = $admin->load($id);
                if (!$admin) {
                    throw new Exception("No Admin Found!");
                }
            }
            $form->setTableRow($admin);
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
            $admin = \Mage::getModel('Model\Admin');
            
            if (!$this->getRequest()->isPost()) {
                throw new Exception("invalid Request");
            }
            $admin_Id = $this->getRequest()->getGet('id');
            $adminData = $this->getRequest()->getPost('admin');
            
            if ($admin_Id) {
                $admin->admin_Id = $admin_Id;
            } else {
               $admin->created_Date = Date("Y-m-d H:i:s");
            }
           
            $admin->setData($adminData);

            if ($admin->save()) {
                $this->getMessage()->setSuccess('Record Successfully Saved');
            } else {
                $this->getMessage()->setFailure('Unable To Save Record');
            }
            
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction() {
        try {
            $admin = \Mage::getModel('Model\Admin');
            $admin_Id = (int) $this->getRequest()->getGet('id');

            if (!$admin_Id) {
                throw new Exception("Id is required");
            }
            if ($admin_Id) {
                $admin =  $admin->load($admin_Id); 
                if(!$admin){
                 throw new Exception("Unable to Load data.");
                }
            }

            if ($admin->delete($admin_Id)) {
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