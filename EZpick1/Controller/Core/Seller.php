<?php
namespace Controller\Core;
\Mage::loadFileByClassName('Controller\Core\Abstracts');
\Mage::loadFileByClassName('Block\Seller\Layout');

class Seller extends Abstracts
{
    protected $layout = null;
    protected $message = null;

    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {
            $layout = \Mage::getBlock('Block\Seller\Layout');
        }
        if (!$layout instanceof \Block\Seller\Layout) {
           throw new \Exception("Must be an instance of \Block\Seller\Layout");
        }
        $this->layout = $layout;
        return $this;
    }

    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Seller\Message');
        return $this;
    }
}