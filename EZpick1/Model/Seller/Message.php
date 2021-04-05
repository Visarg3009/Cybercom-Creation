<?php
namespace Model\Seller;
\Mage::loadFileByClassName('Model\Seller\Session');

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
        $this->failure = $message;
        return $this;
    }

    public function getFailure()
    {
        return $this->failure;
    }

    public function clearSuccess()
    {
        unset($this->success);
        return $this;
    }

    public function clearFailure()
    {
        unset($this->failure);
        return $this;
    }
}