<?php
namespace Controller\Admin\Category;
\Mage::getController('Controller\Core\Admin');

class Media extends \Controller\Core\Admin
{
    public function gridAction() {
        try {
            $grid = \Mage::getBlock('Block\Admin\Category\Edit\Tabs\Media');
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
            $form = \Mage::getBlock('Block\Admin\Category\Edit\Tabs\Media');

            $id = (int)$this->getRequest()->getGet('id');
            $categoryMedia = \Mage::getModel('Model\Category\Media');
            if ($id) {    
                $categoryMedia = $categoryMedia->load($id);
                if (!$categoryMedia) {
                    throw new \Exception("No categoryMedia Found!");
                }
            }
            $form->setTableRow($categoryMedia);
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
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function uploadAction()
    {
        try {
            $categoryMedia = \Mage::getModel('Model\Category\Media');

            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }
            $category_Id = $this->getRequest()->getGet('id');
            $categoryImg = $this->getRequest()->getFiles('productFile');
            
            if ($category_Id) {
                $categoryMedia->category_Id = $category_Id;
            }
            
            $filename = $categoryImg['name'];
            $filetmp = $categoryImg['tmp_name'];
            $path = $categoryMedia->getImagePath().$filename;

            move_uploaded_file($filetmp,$path);
            
            $categoryMedia->image_name = $filename;

            if ($categoryMedia->save()) {
                $this->getMessage()->setSuccess('Record Successfully Saved');
            } else {
                $this->getMessage()->setFailure('Unable To Save Record');
            }
            $this->gridAction();

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        
    }

    public function saveAction() {
        try {
            $categoryMedia = \Mage::getModel('Model\Category\Media');
            $category = \Mage::getModel('Model\Product');

            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }

            $category_Id = $this->getRequest()->getGet('id');
            $imageData = $this->getRequest()->getPost('image');

            if ($category_Id) {
                $category =  $category->load($category_Id); 
                if(!$category){
                 throw new \Exception("Unable to Load data.");
                }
            }

            foreach ($imageData['data'] as $key => $value) {
                $categoryMedia->category_Id = $key;
                $categoryMedia->image_name = $value['name'];
                if ($value['gallery']) {
                    $categoryMedia->gallery = 1;
                } else {
                    $categoryMedia->gallery = 0;
                }
                
                if ($imageData['small'] == $key) {
                    $categoryMedia->small = 1;
                } else {
                    $categoryMedia->small = 0;
                }

                if ($imageData['thumb'] == $key) {
                    $categoryMedia->thumb = 1;
                } else {
                    $categoryMedia->thumb = 0;
                }

                if ($imageData['base'] == $key) {
                    $categoryMedia->base = 1;
                } else {
                    $categoryMedia->base = 0;
                }
                $categoryMedia->save();
            }
            
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction() {
        try {
            $categoryMedia = \Mage::getModel('Model\Category\Media');
            $imageData = $this->getRequest()->getPost('image');

            foreach ($imageData['remove'] as $category_Id) {
                $categoryMedia =  $categoryMedia->load($category_Id);
                $categoryMedia->delete($category_Id);
            }

        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}