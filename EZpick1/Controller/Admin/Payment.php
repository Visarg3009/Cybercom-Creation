<?php
namespace Controller\Admin;

class Payment extends \Controller\Core\Admin
{
    public function gridAction() {
        try{
            $grid = \Mage::getBlock('Block\Admin\Payment\Grid');
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
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function formAction() {
        try {
            $form = \Mage::getBlock('Block\Admin\Payment\Edit');

            $id = (int)$this->getRequest()->getGet('id');
            $payment = \Mage::getModel('Model\Payment');
            if ($id) {    
                $payment = $payment->load($id);
                if (!$payment) {
                    throw new Exception("No Payment Found!");
                }
            }
            $form->setTableRow($payment);
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
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function saveAction() {
        try {
            $payment = \Mage::getModel('Model\Payment');
            
            if (!$this->getRequest()->isPost()) {
                throw new Exception("invalid Request");
            }
            $method_Id = $this->getRequest()->getGet('id');
            $paymentData = $this->getRequest()->getPost('payment');
            
            if ($method_Id) {
                $payment->method_Id = $method_Id;
            } else {
                $payment->Created_Date = Date("Y-m-d H:i:s");
            }
            $payment->setData($paymentData);
            $payment->save();
        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction() {
        try {
            $payment = \Mage::getModel('Model\Payment');
            $method_Id = (int) $this->getRequest()->getGet('id');

            if (!$method_Id) {
                throw new Exception("Id is required");
            }
            if ($method_Id) {
                $payment =  $payment->load($method_Id); 
                if(!$payment){
                 throw new Exception("Unable to Load data.");
                }
            }
            $payment->delete($method_Id);

        } catch (Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}