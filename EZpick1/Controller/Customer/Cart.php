<?php
namespace Controller\Customer;

class Cart extends \Controller\Core\Customer
{
    public function gridAction()
    {
        $grid = \Mage::getBlock('Block\Customer\Cart\Grid');
        $layout = $this->getLayout();
        $layout->addChild($grid,'content');
        $cart = $this->getCart();
        $grid->setCart($cart);
        $this->toHtmlLayout();
    }

    public function addItemToCartAction()
    {
        try {
            $product = \Mage::getModel('Model\Product');
            if (!$id = $this->getRequest()->getGet('id')) {
                throw new \Exception("Product Not Available");
            }
            $product = $product->load($id);
            $cart = $this->getCart();
            $cart->addItemToCart($product);

        } catch (\Exception $e) {
            
        }
        $this->redirect('grid');
    }

    protected function getCart()
    {
        $sessionId = \Mage::getModel('Model\Customer\Session')->getId();
        $customer_Id = $_SESSION['customer_Id'];
        if (!$customer_Id) {
            header("Location: http://localhost/EZpick1/View/home/login.php");
            exit();
        }
        $cart = \Mage::getModel('Model\Cart');
        $query = "SELECT * FROM `{$cart->getTableName()}` WHERE customer_Id = '{$customer_Id}';";
        $cart = $cart->fetchRow($query);

        if ($cart) {
            return $cart;
        }
        
        $cart = \Mage::getModel('Model\Cart');
        $cart->sessionId = $sessionId;
        $cart->customer_Id = $customer_Id;
        $cart->created_Date = date("Y-m-d H:i:s");
        $cart->save();
        return $cart;
    }

    public function updateCartAction()
    {
        $itemData = $this->getRequest()->getPost('item');
        foreach ($itemData as $cartItemId => $quantity) {
            if ($quantity != 0) {
                $item = \Mage::getModel('Model\Cart\Item')->load($cartItemId);
                $item->quantity = $quantity;
                $item->save();
            }
            if ($quantity == 0) {
                $this->deleteAction($cartItemId);
            }
        }
        $this->getMessage()->setSuccess('Cart update Successfully.');
        $grid = \Mage::getBlock('Block\Customer\Cart\Grid')->setCart($this->getCart());
        $content = $grid->toHtml();
        $response = [
            'element' => [
                [
                    'selector' => '#contentHtml',
                    'html' => $content,
                ],
            ]
        ];
        header("Content-type:appliction/json; charset=utf-8");
        echo json_encode($response);
    }

    public function deleteAction($itemId = null)
    {
        $cartItem = \Mage::getModel('Model\Cart\Item');
        $cartItemId = $this->getRequest()->getGet('id');
        if ($itemId) {
            $cartItemId = $itemId;
        }
        $cartItem = $cartItem->load($cartItemId);
        if ($cartItem) {
            $cartItem->delete($cartItemId);
        }
        if ($itemId) {
            return true;
        } else {
            $this->getMessage()->setSuccess('Item deleted.');
            $grid = \Mage::getBlock('Block\Admin\Cart\Grid')->setCart($this->getCart())->toHtml();
            $response = [
                'element' => [
                    [
                        'selector' => '#contentHtml',
                        'html' => $grid,
                    ],
                    [
                        'selector' => '#tabHtml',
                        'html' => null,
                    ],
                ],
            ];
            header("Content-type:appliction/json; charset=utf-8");
            echo json_encode($response);
        }
    }
}