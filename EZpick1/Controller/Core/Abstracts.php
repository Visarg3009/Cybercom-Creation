<?php
namespace Controller\Core;
\Mage::loadFileByClassName('Block\Core\Layout');
/**
 * 
 */
class Abstracts
{
	protected $layout = null;
    protected $request = null;
    protected $message = null;

    public function __CONSTRUCT()
    {
        $this->setLayout();
        $this->setMessage();
    }
    public function getLayout()
    {
        return $this->layout;
    }

    public function setLayout(\Block\Core\Layout $layout = null)
    {
        if (!$layout) {
            $layout = \Mage::getBlock('Block\Core\Layout');
        }
        $this->layout = $layout;
        return $this;
    }

    public function toHtmlLayout()
    {
        echo $this->getLayout()->toHtml();
    }

    public function redirect($actionName = NULL,$controllerName = NULL,$params = [],$resetParams = False)
    {

        header("Location:{$this->getUrl($actionName,$controllerName,$params,$resetParams)}");
        exit();
    }

    public function getUrl($actionName = NULL,$controllerName = NULL,$params = [],$resetParams = false)
    {
        $final = $_GET;

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
        return "http://localhost/EZpick1/index.php?{$queryString}";
    }

    public function getRequest() {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }

    public function setRequest($request=null) {
        if (!$request) {
            $request = \Mage::getModel('Model\Core\Request');
        }
        $this->request = $request;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }
}