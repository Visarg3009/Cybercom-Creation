<?php
namespace Controller\Admin;

class Shipment extends \Controller\Core\Admin
{
    public function gridAction() {
        try {
            $grid = \Mage::getBlock('Block\Admin\Shipment\Grid');
            $contentHtml = $grid->toHtml();

            $response = [
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

    public function formAction() {
        try {  
            $form = \Mage::getBlock('Block\Admin\Shipment\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $shipment = \Mage::getModel('Model\Shipment');
            if ($id) {    
                $shipment = $shipment->load($id);
                if (!$shipment) {
                    throw new \Exception("No Shipment Found!");
                }
            }
            $form->setTableRow($shipment);
            $contentHtml = $form->toHtml();
            
            $response = [
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

    public function saveAction() {
        try {
            $shipment = \Mage::getModel('Model\Shipment');
            
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }
            $method_Id = $this->getRequest()->getGet('id');
            $shipmentData = $this->getRequest()->getPost('shipment');
            
            if ($method_Id) {
                $shipment->method_Id = $method_Id;
            } else {
                $shipment->Created_Date = Date("Y-m-d H:i:s");
            }
            $shipment->setData($shipmentData); 
            $shipment->save();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction() {
        try {
            $shipment = \Mage::getModel('Model\Shipment');
            $method_Id = (int) $this->getRequest()->getGet('id');

            if (!$method_Id) {
                throw new \Exception("Id is required");
            }

            if ($method_Id) {
                $shipment =  $shipment->load($method_Id); 
                if(!$shipment){
                 throw new \Exception("Unable to Load data.");
                }
            }
            $shipment->delete($method_Id);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}