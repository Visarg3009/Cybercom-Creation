<?php
namespace Controller\Admin;
\Mage::getController('Controller\Core\Admin');

class Payment extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction() {
        try{
            $grid = \Mage::getBlock('Block\Admin\Payment\Grid');
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
            $payment = \Mage::getModel('Model\Payment');
            
            if (!$this->getRequest()->isPost()) {
                throw new Exception("invalid Request");
            }
            $method_Id = $this->getRequest()->getGet('id');
            $paymentData = $this->getRequest()->getPost('payment');
            
            if ($method_Id) {
                $payment->method_Id = $method_Id;
            } else {
                $payment->created_Date = Date("Y-m-d H:i:s");
            }

            $payment->setData($paymentData);
            
            if ($payment->save()) {
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
            
            if ($payment->delete($method_Id)) {
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