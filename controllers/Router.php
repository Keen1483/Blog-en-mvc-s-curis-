<?php
require_once('views/View.php');

class Router
{
    private $_ctrl;
    private $_view;

    public function RouteReq()
    {
        try {
            spl_autoload_register(function($class) {
                require_once('models/'.$class.'.php');
            });
            
            $url = [];
            
            if(isset($_GET['url'])) {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                
                
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                
                if(file_exists($controllerFile)) {
                    
                    require_once($controllerFile);
                    //$this->_ctrl = new $controllerClass($url);
                    $this->_ctrl = new ControllerAcceuil($url);
                } else {
                    
                    throw new Exception("Page introuvable");
                }
            } else {
                require_once('controllers/ControllerAccueil.php');
                $this->_ctrl = new ControllerAcceuil($url);
            }
        } catch(Exception $e) {
            
            $errorMsg = $e->getMessage();

            $_view = new View('Error');
            $_view->generate(['errorMsg' => $errorMsg]);
        }
    }
}