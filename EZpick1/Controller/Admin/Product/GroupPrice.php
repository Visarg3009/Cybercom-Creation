<?php
namespace Controller\Admin\Product;
\Mage::getController('Controller\Core\Admin');

class GroupPrice extends \Controller\Core\Admin
{
    public function indexAction()
    {
        $layout = $this->getLayout();
        $this->toHtmlLayout();
    }

    public function gridAction()
    {
        try{
            $grid = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\GroupPrice');
            $contentHtml = $grid->toHtml();

            $response = [
                'status' => 'success',
                'message' => 'hello',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $contentHtml,
                    ]
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
            $form = \Mage::getBlock('Block\Admin\Product\Edit\Tabs\GroupPrice');
            $contentHtml = $form->toHtml();

            $tab = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
            $leftHtml = $tab->toHtml();
            
            $response = [
                'status' => 'success',
                'message' => 'hello',
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $contentHtml
                    ],
                    [
                        'selector' => '#leftHtml',
                        'html' => $leftHtml
                    ]
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
            $product = \Mage::getModel('Model\Product');

            if (!$this->getRequest()->isPost()) {
                throw new \Exception("invalid Request");
            }

            $productId = $this->getRequest()->getGet('id');
            $groupPriceData = $this->getRequest()->getPost('groupPrice');

            if (array_key_exists('exist', $groupPriceData)) {
                foreach ($groupPriceData['exist'] as $groupId => $price) {
                    $groupPrice = \Mage::getModel('Model\Product\Group\Price');
                    $query = "SELECT * FROM product_group_price
                    WHERE `productId` = '{$productId}'
                        AND `customerGroupId` = '{$groupId}'";
                    $groupPrice->fetchRow($query);
                    $groupPrice->price = $price; 
                    $groupPrice->save();
                }
            }

            if (array_key_exists('new', $groupPriceData)) {
                foreach ($groupPriceData['new'] as $groupId => $price) {
                    $groupPrice = \Mage::getModel('Model\Product\Group\Price');
                    $groupPrice->customerGroupId = $groupId;
                    $groupPrice->productId = $productId;
                    $groupPrice->price = $price;
                    $groupPrice->save();
                }
            }
        
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $this->gridAction();
    }
}
?>