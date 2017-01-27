<?php

namespace src\Controller;

use src\Controller;
include('defaultController.php');

class Dispatcher
{
    private $url;
    private $method;
    private $result;
    private $defControl;

    public function __construct($em)
    {
        $this->em = $em; // <-- Doctrine object
        $this->url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->defControl = new DefaultController($this->em);
    }

    public function dispatch()
    {
        $flag = true;
        if(!is_null($this->url)){
            $this->match($this->url);
            if(isset($this->result[0]) && isset($this->result[1])) {
                $path = __DIR__ . DIRECTORY_SEPARATOR . ucfirst($this->result[0]) . 'Controller.php';               
                $controller = '\\src\\Controller\\' . ucfirst($this->result[0]) . 'Controller';
                $action = $this->result[1] . 'Action';
                // var_dump($path, $controller, $action);die();
                
                if (file_exists($path)) {
                    // Don't forget to give Doctrine to the controller
                    $theController = new $controller($this->em);
                    if (method_exists($theController, $action)) {
                        $flag = false;
                        return $theController->$action($this->result);
                    }
                }
            }
        }

        if($flag){
            return $this->defControl->indexAction();
        }            
    

    }

    /**
     * @param $url
     */
    // Split (/) url in array and store it in $this->result
    private function match($url){
        $pattern = '/\//';
        $url = trim($url,'\/');
        $this->result = array_slice(preg_split($pattern,$url), 2);
    }


}