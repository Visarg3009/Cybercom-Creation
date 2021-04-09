<?php
namespace Controller\Core;
\Mage::loadFileByClassName('Controller\Core\Abstracts');
\Mage::loadFileByClassName('Block\Customer\Layout');

class Admin extends Abstracts
{
    protected $layout = null;
    protected $message = null;
    
    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {
            $layout = \Mage::getBlock('Block\Admin\Layout');
        }
        if (!$layout instanceof \Block\Admin\Layout) {
           throw new \Exception("Must be an instance of \Block\Admin\Layout");
        }
        $this->layout = $layout;
        return $this;
    }

    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }
}
?>