<?php
namespace Controller\Admin;
\Mage::getController('Controller\Core\Admin');

class Shipment extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try {
            $grid = \Mage::getBlock('Block\Admin\Shipment\Grid');
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
            $form = \Mage::getBlock('Block\Admin\Shipment\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $shipment = \Mage::getModel('Model\Shipment');
            if ($id) {    
                $shipment = $shipment->load($id);
                if (!$shipment) {
                    throw new Exception("No Shipment Found!");
                }
            }
            $form->setTableRow($shipment);
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
            $e->getMessage();
        }
    }

    public function saveAction() {
        try {
            $shipment = \Mage::getModel('Model\Shipment');
            
            if (!$this->getRequest()->isPost()) {
                throw new Exception("invalid Request");
            }
            $method_Id = $this->getRequest()->getGet('id');
            $shipmentData = $this->getRequest()->getPost('shipment');
            
            if ($method_Id) {
                $shipment->method_Id = $method_Id;
            } else {
                $shipment->Created_Date = Date("Y-m-d H:i:s");
            }
            
            $shipment->setData($shipmentData);
            
            if ($shipment->save()) {
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
            $shipment = \Mage::getModel('Model\Shipment');
            $method_Id = (int) $this->getRequest()->getGet('id');

            if (!$method_Id) {
                throw new Exception("Id is required");
            }

            if ($method_Id) {
                $shipment =  $shipment->load($method_Id); 
                if(!$shipment){
                 throw new Exception("Unable to Load data.");
                }
            }

            if ($shipment->delete($method_Id)) {
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