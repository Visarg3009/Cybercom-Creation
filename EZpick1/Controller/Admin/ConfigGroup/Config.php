<?php
namespace Controller\Admin\ConfigGroup;

class Config extends \Controller\Core\Admin
{
    public function gridAction()
    {
        try {
            $grid = \Mage::getBlock('Block\Admin\ConfigGroup\Edit\Tabs\Configuration');
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
        $this->gridAction();
    }

    public function formAction()
    {
        try {
            $form = \Mage::getBlock('Block\Admin\ConfigGroup\Edit\Tabs\Configuration');
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
        $this->gridAction();
    }

    public function saveAction()
    {
        try {
            $configGroup = \Mage::getModel('Model\ConfigGroup');

            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }

            $groupId = $this->getRequest()->getGet('id');
            $configExist = $this->getRequest()->getPost('exist');
            $configNew = $this->getRequest()->getPost('new');

            if (!$configExist) {
                $config = \Mage::getModel('Model\ConfigGroup\Config');
                $query = "DELETE FROM `{$config->getTableName()}` WHERE `groupId` = '{$groupId}';";
                $config->getAdapter()->update($query);
            }

            if ($configExist) {
                $ids = '';
                foreach ($configExist as $configId => $value) {
                    $query = "SELECT * FROM config
                    WHERE `groupId` = '{$groupId}'
                        AND `configId` = '{$configId}';";

                    $config = \Mage::getModel('Model\ConfigGroup\Config');
                    $config->fetchRow($query);
                    $config->title = $value['title'];
                    $config->code = $value['code'];
                    $config->value = $value['value'];
                    $config->save();
                    $ids .= $configId.',';
                }
                $ids = '('. rtrim($ids, ',').')';
                $config = \Mage::getModel('Model\ConfigGroup\config');
                $query = "DELETE FROM `{$config->getTableName()}` WHERE `groupId` = '{$groupId}' AND `{$config->getPrimaryKey()}` NOT IN {$ids};";
                $config->getAdapter()->update($query);
            }

            if ($configNew) {
                for ($i=0; $i < sizeof($configNew['title']); $i++) {
                    $data = array_column($configNew,$i);
                    $config = \Mage::getModel('Model\ConfigGroup\config');
                    $config->title = $data[0];
                    $config->code = $data[1];
                    $config->value = $data[2];
                    $config->groupId = $groupId;
                    $config->created_Date = Date("Y-m-d H:i:s");
                    $config->save();
                }
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}