<?php
namespace Controller\Admin;
\Mage::getController('Controller\Core\Admin');

class ConfigGroup extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try{
            $grid = \Mage::getBlock('Block\Admin\ConfigGroup\Grid');
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

    public function formAction()
    {
        try {
            $form = \Mage::getBlock('BLock\Admin\ConfigGroup\Edit');

            $groupId = (int) $this->getRequest()->getGet('id');
            $configGroup = \Mage::getModel('Model\ConfigGroup');
            if ($groupId) {
                $configGroup = $configGroup->load($groupId);
                if (!$configGroup) {
                    throw new \Exception("No group found!");
                }
            }
            $form->setTableRow($configGroup);
            $contentHtml = $form->toHtml();

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

    public function saveAction()
    {
        try {
            $configGroup = \Mage::getModel('Model\ConfigGroup');

            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }
            $groupId = $this->getRequest()->getGet('id');
            $configGroupData = $this->getRequest()->getPost('configGroup');

            if ($groupId) {
                $configGroup->groupId = $groupId;
            } else {
                $configGroup->created_Date = Date("Y-m-d H:i:s");
            }
            $configGroup->setData($configGroupData);
            $configGroup->save();
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }

    public function deleteAction()
    {
        try {
            $configGroup = \Mage::getModel('Model\ConfigGroup');
            $groupId = (int) $this->getRequest()->getGet('id');

            if (!$groupId) {
                throw new \Exception("Id is required!");
            }
            $configGroup = $configGroup->load($groupId);
            if (!$configGroup) {
                throw new \Exception("Unable to load Data");
            }

            if ($configGroup->delete($groupId)) {
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