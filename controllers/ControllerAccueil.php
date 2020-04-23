<?php
require_once('views/View.php');

class ControllerAcceuil
{
    private $_articleManager;
    private $_view;
    
    public function __construct($url)
    {
        if(isset($url) && count($url) > 1)
            throw new Exception("Page introuvable");
        else {
            $this->articles();
        }
    }
    
    public function articles()
    {
        $this->_articleManager = new ArticleManager();
        $articles = $this->_articleManager->getArticle();
        
        $this->_view = new View('Accueil');
        $this->_view->generate(['articles' => $articles]);
    }
}