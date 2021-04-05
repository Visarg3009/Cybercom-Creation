<?php
namespace Controller\Seller;
\Mage::loadFileByClassName('Controller\Core\Seller');

class Product extends \Controller\Core\Seller
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try {
            $grid = \Mage::getBlock('Block\Seller\Product\Grid');
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
            $form = \Mage::getBlock('Block\Seller\Product\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $product = \Mage::getModel('Model\Product');
            if ($id) {    
                $product = $product->load($id);
                if (!$product) {
                    throw new Exception("No Product Found!");
                }
            }
            $form->setTableRow($product);
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
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function saveAction() {
        try {
            $product = \Mage::getModel('Model\Product');

            if (!$this->getRequest()->isPost()) {
                throw new Exception("invalid Request");
            }

            $sellerId = $_SESSION['sellerId'];
            $product_id = $this->getRequest()->getGet('id');
            $productData = $this->getRequest()->getPost('product');

            if ($product_id) {
                $product->product_id = $product_id;
                $product->updated_Date = Date("Y-m-d H:i:s");
            } 
             else {
               $product->created_Date = Date("Y-m-d H:i:s");
            }

            $product->sellerId = $sellerId;
            $product->setData($productData);

            if ($product->save()) {
                
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
            $product = \Mage::getModel('Model\Product');
            $product_id = (int) $this->getRequest()->getGet('id');

            if (!$product_id) {
                throw new Exception("Id is required");
            }

            if ($product_id) {
                $product =  $product->load($product_id); 
                if(!$product){
                 throw new Exception("Unable to Load data.");
                }
            }

            if ($product->delete($product_id)) {
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