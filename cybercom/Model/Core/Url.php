<?php
namespace Model\Core;

class Url
{
    protected $request = null;

    public function __CONSTRUCT()
    {
        $this->setRequest();
    }

    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getUrl($actionName = NULL,$controllerName = NULL,$params = [],$resetParams = false)
    {
        $final = $this->getRequest()->getGet();

        if($resetParams) {
            $final = [];
        }
        
       if (empty(trim($actionName))) {
            $actionName = $_GET['a'];
       }
       if (empty(trim($controllerName))) {
            $controllerName = $_GET['c'];
       }

        $final['c'] = $controllerName;
        $final['a'] = $actionName;

        if(is_array($params)) {
            $final = array_merge($final,$params);
        }

        $queryString = http_build_query($final);
        return "http://localhost/cybercom/index.php?{$queryString}";
    }

    public function baseUrl($subUrl = null)
    {
        $url = "http://localhost/cybercom/";
        if ($subUrl) {
            $url .= $subUrl;
        }
        return $url;
    }
}
?>