<?php

class Router{
    public $uri;
    protected $controller;
    protected $method;
    protected $param;


    public function __construct(){
        $this->setUri();
        $this->setController();
        $this->setMethod();
        $this->setParam();

    }

    public function setUri(){
        $this->uri = explode ('/', URI);
    }
    #colocar el primer del array elemento del path de tu directorio
    public function setController()
    {
      $this->controller = $this->uri[4] === '' ? 'Home' : $this->uri[4];
    }
    public function setMethod()
    {
      $this->method = ! empty($this->uri[5]) ? $this->uri[5] : 'exec';
    }
    public function setParam()
    {
      /*if(REQUEST_METHOD === 'POST')
        $this->param = $_POST;
      else if (REQUEST_METHOD === 'GET')*/
        $this->param = ! empty($this->uri[6]) ? $this->uri[6] : '';
    }

    public function getUri()
    {
      return $this->uri;
    }
  
    public function getController()
    {
      return $this->controller;
    }
  
    public function getMethod()
    {
      return $this->method;
    }

    public function getParam()
    {
      return $this->param;
    }

}


?>