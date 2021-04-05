<?php
namespace Model\Core;

class Session
{
    protected $nameSpace = 'core';

    function __CONSTRUCT()
    {
        $this->start();
    }

    public function getNamespace()
    {
        return $this->nameSpace;
    }

    public function setNameSpace($nameSpace)
    {
        $this->nameSpace = $nameSpace;
        return $this;
    }

    public function start()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return $this;
    }

    public function destroy()
    {
        session_destroy();
        return $this;
    }

    public function getId()
    {
        return session_id();
    }

    public function regenerateId()
    {
        return session_regenerate_id();
    }

    public function __set($key, $value)
    {
        $_SESSION[$this->getNameSpace()][$key] = $value;
        return $this;
    }

    public function __get($key)
    {
        if (!array_key_exists($this->getNameSpace(),$_SESSION)) {
            return null;
        }
        if (!array_key_exists($key, $_SESSION[$this->getNameSpace()])) {
            return null;
        } 
        return $_SESSION[$this->getNameSpace()][$key];
    }

    public function __unset($key)
    {
        if (array_key_exists($key, $_SESSION[$this->getNameSpace()])) {
            unset($_SESSION[$this->getNameSpace()][$key]);
        }
        return $this;
    }
}
?>