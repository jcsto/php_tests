<?php

class Request {
    
    private route;
    public id;
    
    public function __construct()
    {
        $this->getRequest();
        $this->id = array_slice($this->route , -1);
    }
    
    public function getId()
    {
        return $this->id[0];
    }
    
    public function getRequest()
    {
         $this->route = explode('/', $_SERVER['REQUEST_URI']);
    }
    
    public function getAll()
    {
        
    }
    
}