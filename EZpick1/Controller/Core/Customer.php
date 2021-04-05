<?php
namespace Controller\Core;
\Mage::loadFileByClassName('Controller\Core\Abstracts');
\Mage::loadFileByClassName('Block\Customer\Layout');

class Customer extends Abstracts
{
    protected $layout = null;
    protected $message = null;

    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {
            $layout = \Mage::getBlock('Block\Customer\Layout');
        }
        if (!$layout instanceof \Block\Customer\Layout) {
           throw new Exception("Must be an instance of \Block\Customer\Layout");
        }
        $this->layout = $layout;
        return $this;
    }

    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Customer\Message');
        return $this;
    }
}