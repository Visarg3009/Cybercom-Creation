<?php
namespace Model\Core;

class Request{
    public $request;
    public function getRequest() {
        return $this->request;
    }

    public function setRequest($request) {
        $this->request = $request;
        return $this;
    }

    public function getPost($key = NULL,$optional = NULL)
    {
        if (!$key) {
            return $_POST;
        }
        if (!array_key_exists($key,$_POST)) {
            return $optional;
        }
        return $_POST[$key];
    }

    public function getFiles($key = NULL,$optional = NULL)
    {
        if (!$key) {
            return $_FILES;
        }
        if (!array_key_exists($key,$_FILES)) {
            return $optional;
        }
        return $_FILES[$key];
    }

    public function getGet($key = NULL,$optional = NULL)
    {
        if (!$key) {
            return $_GET;
        }
        if (!array_key_exists($key,$_GET)) {
            return $optional;
        }
        return $_GET[$key];
    }

    public function isPost()
    {
        if (!$_SERVER['REQUEST_METHOD'] = 'POST') {
            return FALSE;
        }
        return TRUE;
    }

    public function getActionName()
    {
        return $this->getGet('a','index');
    }

    public function getControllerName()
    {
        return $this->getGet('c','index');  
    }  
}

?>