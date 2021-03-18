<?php
namespace Model\Core;
\Mage::loadFileByClassName('Model\Core\Session');

class Message extends Session 
{
    function __CONSTRUCT()
    {
        parent::__CONSTRUCT();
    }
    
    public function setSuccess($message)
    {
        $this->success = $message;
        return $this;
    }

    public function getSuccess()
    {
        return $this->success;
    }

    public function setFailure($message)
    {
        $this->success = $message;
        return $this;
    }

    public function getFailure()
    {
        return $this->success;
    }

    public function setNotice($message)
    {
        $this->success = $message;
        return $this;
    }

    public function getNotice()
    {
        return $this->success;
    }
}


?>
