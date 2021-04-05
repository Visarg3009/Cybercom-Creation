<?php
namespace Controller\Admin\Product;
\Mage::getController('Controller\Core\Admin');

class Media extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try {
            $grid = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Media');
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
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function formAction()
    {
        try {
            $form = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\Media');

            $id = (int)$this->getRequest()->getGet('id');
            $productMedia = \Mage::getModel('Model\ProductMedia');
            if ($id) {    
                $productMedia = $productMedia->load($id);
                if (!$productMedia) {
                    throw new Exception("No productMedia Found!");
                }
            }
            $form->setTableRow($productMedia);
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

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function uploadAction()
    {
        try {
            $productMedia = \Mage::getModel('Model\ProductMedia');

            if (!$this->getRequest()->isPost()) {
                throw new Exception("invalid Request");
            }
            $product_Id = $this->getRequest()->getGet('id');
            $productImg = $this->getRequest()->getFiles('productFile');
            
            if ($product_Id) {
                $productMedia->product_Id = $product_Id;
            }
            
            $filename = $productImg['name'];
            $filetmp = $productImg['tmp_name'];
            $path = $productMedia->getImagePath().$filename;

            move_uploaded_file($filetmp,$path);
            
            $productMedia->image_name = $filename;

            if ($productMedia->save()) {
                $this->getMessage()->setSuccess('Record Successfully Saved');
            } else {
                $this->getMessage()->setFailure('Unable To Save Record');
            }
            $this->gridAction();

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        
    }

    public function saveAction() {
        try {
            $productMedia = \Mage::getModel('Model\ProductMedia');
            $product = \Mage::getModel('Model\Product');

            if (!$this->getRequest()->isPost()) {
                throw new Exception("invalid Request");
            }

            $product_Id = $this->getRequest()->getGet('id');
            $imageData = $this->getRequest()->getPost('image');

            if ($product_Id) {
                $product =  $product->load($product_Id); 
                if(!$product){
                 throw new Exception("Unable to Load data.");
                }
            }

            foreach ($imageData['data'] as $key => $value) {
                $productMedia->image_Id = $key;
                $productMedia->image_name = $value['name'];
                if ($value['gallery']) {
                    $productMedia->gallery = 1;
                } else {
                    $productMedia->gallery = 0;
                }
                
                if ($imageData['small'] == $key) {
                    $productMedia->small = 1;
                } else {
                    $productMedia->small = 0;
                }

                if ($imageData['thumb'] == $key) {
                    $productMedia->thumb = 1;
                } else {
                    $productMedia->thumb = 0;
                }

                if ($imageData['base'] == $key) {
                    $productMedia->base = 1;
                } else {
                    $productMedia->base = 0;
                }
                $productMedia->save();
            }
            
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction() {
        try {
            $productMedia = \Mage::getModel('Model\ProductMedia');
            $imageData = $this->getRequest()->getPost('image');

            foreach ($imageData['remove'] as $image_Id) {
                $productMedia =  $productMedia->load($image_Id);
                $productMedia->delete($image_Id);
            }

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}
?>