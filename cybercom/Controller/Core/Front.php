<?php
namespace Controller\Core;

class Front
{
    public static function init() 
    {
        $request = \Mage::getModel('Model\Core\Request');
        $controllerName = $request->getControllerName();
        $className = self::prepareClassName($controllerName,"Controller");
        $actionName = $request->getActionName();
        $method = $actionName.'Action';

        $controller = \Mage::getController($className);
        $controller->$method();
    }

    public static function prepareClassName($key,$namespace)
    {
        $className = $namespace."\\".$key;
        $className = str_replace("\\"," ",$className);
        $className = ucwords($className);
        $className = str_replace(" ","\\",$className);
        return $className;
    }
}
?>