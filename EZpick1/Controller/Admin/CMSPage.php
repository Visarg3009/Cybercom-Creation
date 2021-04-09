<?php
namespace Controller\Admin;
\Mage::getController('Controller\Core\Admin');

class CMSPage extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try {
            $grid = \Mage::getBlock('Block\Admin\CMSPage\Grid');
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

    public function formAction()
    {
        try {
            $form = \Mage::getBlock('Block\Admin\CMSPage\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $cmsPage = \Mage::getModel('Model\CMSPage');
            if ($id) {    
                $cmsPage = $cmsPage->load($id);
                if (!$cmsPage) {
                    throw new \Exception("No cmsPage Found!");
                }
            }
            $form->setTableRow($cmsPage);
            $contentHtml = $form->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'hello',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $contentHtml
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
            $cmsPage = \Mage::getModel('Model\CMSPage');

            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }

            $page_Id = $this->getRequest()->getGet('id');
            $cmsPageData = $this->getRequest()->getPost('cmsPage');

            if ($page_Id) {
                $cmsPage->page_id = $page_id;
            } 
             else {
               $cmsPage->created_Date = Date("Y-m-d H:i:s");
            }

            $cmsPage->setData($cmsPageData);

            if ($cmsPage->save()) {
                
                $this->getMessage()->setSuccess('Record Successfully Saved');
            } else {
                $this->getMessage()->setFailure('Unable To Save Record');
            }
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',Null,Null,true);
    }

    public function deleteAction() {
        try {
            $page_Id = (int) $this->getRequest()->getGet('id');

            if (!$page_Id) {
                throw new \Exception("Id is required");
            }

            $model = \Mage::getModel('Model\CMSPage');
            if ($model->delete($page_Id)) {
                $this->getMessage()->setSuccess('Record Successfully Deleted!!');
            } else {
                $this->getMessage()->setFailure('Unable To Delete Record.');
            }

            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->redirect('grid',Null,Null,true);
    }
}
?>